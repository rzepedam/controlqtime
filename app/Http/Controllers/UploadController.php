<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Company;
use App\ImageRutCompany;
use App\ImageLicenseCompany;

class UploadController extends Controller
{

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUpload($id)
    {
        $imagesRut      = Company::findOrFail($id)->imageRutCompanies;
        $imagesLicense  = Company::findOrFail($id)->imageLicenseCompanies;
        return view('maintainers.companies.upload', compact('id', 'imagesRut', 'imagesLicense'));
    }


    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function addFiles(Request $request)
    {
        $id             = $request->get('id');
        $type           = $request->get('type');
        $path           = public_path() . '/storage/companies/' . $id . '/' . $type . '/';
        $company        = Company::findOrFail($id);
        $file = $request->file('file_data');
        $extension      = $file->getClientOriginalExtension();
        $filename       = Str::random(15) . '.' . $extension;

        if ($type == 'rut') {
            $imgCompany = new ImageRutCompany();
            if (ImageRutCompany::where('orig_name', $file->getClientOriginalName())->first())
                return response()->json([
                    'success'   => false,
                    'error'     => 'El archivo ya existe. Por favor, intente nuevamente.'
                ], 400);
        }else {
            $imgCompany = new ImageLicenseCompany();
            if (ImageLicenseCompany::where('orig_name', $file->getClientOriginalName()))
                return response()->json(['success' => false], 400);
        }

        $imgCompany->name       = $filename;
        $imgCompany->orig_name  = $file->getClientOriginalName();
        $imgCompany->mime       = $file->getClientMimeType();

        $imgCompany->company()->associate($company);

        File::makeDirectory($path, $mode = 0777, true, true);
        $file->move($path, $filename);

        if (!$imgCompany->save())
            return response()->json(['success' => false], 400);

        $this->checkActivateCompany($company);
        return response()->json(['success' => true], 200);

    }


    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function deleteFiles(Request $request) {

        $company    = $request->get('company');
        $type       = $request->get('type');
        $id         = $request->get('key');

        if ($type == 'rut')
            $image  = ImageRutCompany::find($id);
        else
            $image  = ImageLicenseCompany::find($id);

        if ($image->delete()) {
            $path = public_path() . '/storage/companies/' . $company . '/' . $type . '/' . $image->name;
            File::delete($path);
            return response()->json(['success' => true], 200);
        }

        $this->checkActivateCompany($company);
        return response()->json(['success' => false], 400);
    }


    /**
     *
     * @param $company
     *
     */
    public function checkActivateCompany($company)
    {
        $img_rut    = count($company->imageRutCompanies);
        $img_legal  = count($company->imageLicenseCompanies);

        if ($img_rut > 0 && $img_legal > 0)
            $company->status = true;
        else
            $company->status = false;

        $company->save();
    }
}