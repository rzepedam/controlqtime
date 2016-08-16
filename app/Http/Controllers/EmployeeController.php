<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\CertificationRepoInterface;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\CountryRepoInterface;
use Controlqtime\Core\Contracts\DegreeRepoInterface;
use Controlqtime\Core\Contracts\DisabilityRepoInterface;
use Controlqtime\Core\Contracts\DiseaseRepoInterface;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Contracts\ExamRepoInterface;
use Controlqtime\Core\Contracts\FamilyRelationshipRepoInterface;
use Controlqtime\Core\Contracts\FamilyResponsabilityRepoInterface;
use Controlqtime\Core\Contracts\GenderRepoInterface;
use Controlqtime\Core\Contracts\ContactEmployeeRepoInterface;
use Controlqtime\Core\Contracts\ImageFactoryInterface;
use Controlqtime\Core\Contracts\InstitutionRepoInterface;
use Controlqtime\Core\Contracts\ProfessionalLicenseRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\RelationshipRepoInterface;
use Controlqtime\Core\Contracts\SpecialityRepoInterface;
use Controlqtime\Core\Contracts\StudyRepoInterface;
use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;
use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;
use Controlqtime\Core\Contracts\TypeDiseaseRepoInterface;
use Controlqtime\Core\Contracts\TypeExamRepoInterface;
use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;
use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;
use Controlqtime\Http\Requests\Step1Request;
use Controlqtime\Http\Requests\Step2Request;
use Controlqtime\Http\Requests\Step3Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
	protected $certification;
	protected $commune;
	protected $company;
	protected $contact_employee;
	protected $country;
	protected $degree;
	protected $disability;
	protected $disease;
	protected $employee;
	protected $exam;
	protected $family_relationship;
	protected $family_responsability;
	protected $gender;
	protected $image;
	protected $institution;
	protected $professionalLicense;
	protected $province;
	protected $region;
	protected $relationship;
	protected $speciality;
	protected $study;
	protected $type_certification;
	protected $type_disability;
	protected $type_disease;
	protected $type_exam;
	protected $type_professional_license;
	protected $type_speciality;

	public function __construct(EmployeeRepoInterface $employee, CountryRepoInterface $country, GenderRepoInterface $gender, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune, CompanyRepoInterface $company, RelationshipRepoInterface $relationship, DegreeRepoInterface $degree, InstitutionRepoInterface $institution, TypeCertificationRepoInterface $type_certification, TypeSpecialityRepoInterface $type_speciality, TypeProfessionalLicenseRepoInterface $type_professional_license, TypeDisabilityRepoInterface $type_disability, TypeDiseaseRepoInterface $type_disease, TypeExamRepoInterface $type_exam, FamilyRelationshipRepoInterface $family_relationship, StudyRepoInterface $study, CertificationRepoInterface $certification, SpecialityRepoInterface $speciality, ProfessionalLicenseRepoInterface $professionalLicense, DisabilityRepoInterface $disability, DiseaseRepoInterface $disease, ExamRepoInterface $exam, FamilyResponsabilityRepoInterface $family_responsability, ContactEmployeeRepoInterface $contact_employee, ImageFactoryInterface $image)
	{
		$this->certification = $certification;
		$this->commune = $commune;
		$this->company = $company;
		$this->contact_employee = $contact_employee;
		$this->country = $country;
		$this->degree = $degree;
		$this->disability = $disability;
		$this->disease = $disease;
		$this->employee = $employee;
		$this->exam = $exam;
		$this->family_relationship = $family_relationship;
		$this->family_responsability = $family_responsability;
		$this->gender = $gender;
		$this->image = $image;
		$this->institution = $institution;
		$this->professionalLicense = $professionalLicense;
		$this->province = $province;
		$this->region = $region;
		$this->relationship = $relationship;
		$this->speciality = $speciality;
		$this->study = $study;
		$this->type_certification = $type_certification;
		$this->type_disability = $type_disability;
		$this->type_disease = $type_disease;
		$this->type_exam = $type_exam;
		$this->type_professional_license = $type_professional_license;
		$this->type_speciality = $type_speciality;
	}

	public function index()
	{
		return view('human-resources.employees.index');
	}

	// Load data table employee to bootstrap-table
	public function getEmployees()
	{
		$employees = $this->employee->all(['company']);

		return $employees;
	}

	public function create()
	{
		$communes = $this->commune->lists('name', 'id');
		$companies = $this->company->whereLists('state', 'enable', 'firm_name');
		$countries = $this->country->lists('name', 'id');
		$degrees = $this->degree->lists('name', 'id');
		$employees = $this->employee->lists('full_name', 'id');
		$genders = $this->gender->lists('name', 'id');
		$institutions = $this->institution->lists('name', 'id');
		$provinces = $this->province->lists('name', 'id');
		$regions = $this->region->lists('name', 'id');
		$relationships = $this->relationship->lists('name', 'id');
		$type_certifications = $this->type_certification->lists('name', 'id');
		$type_disabilities = $this->type_disability->lists('name', 'id');
		$type_diseases = $this->type_disease->lists('name', 'id');
		$type_exams = $this->type_exam->lists('name', 'id');
		$type_professional_licenses = $this->type_professional_license->lists('name', 'id');
		$type_specialities = $this->type_speciality->lists('name', 'id');

		return view('human-resources.employees.create', compact(
			'communes', 'companies', 'countries', 'degrees', 'employees', 'genders', 'institutions',
			'provinces', 'regions', 'relationships', 'type_certifications', 'type_disabilities', 'type_diseases',
			'type_exams', 'type_professional_licenses', 'type_specialities'
		));

	}

	public function store(Step3Request $request)
	{
		DB::beginTransaction();
		try
		{
			$employee = $this->employee->create(Session::get('step1'));
			$this->contact_employee->createOrUpdateWithArray(Session::get('step1'), $employee);
			$this->family_relationship->createOrUpdateWithArray(Session::get('step1'), $employee);
			$this->study->createOrUpdateWithArray(Session::get('step2'), $employee);
			$this->certification->createOrUpdateWithArray(Session::get('step2'), $employee);
			$this->speciality->createOrUpdateWithArray(Session::get('step2'), $employee);
			$this->professionalLicense->createOrUpdateWithArray(Session::get('step2'), $employee);
			$this->disability->createOrUpdateWithArray($request->all(), $employee);
			$this->disease->createOrUpdateWithArray($request->all(), $employee);
			$this->exam->createOrUpdateWithArray($request->all(), $employee);
			$this->family_responsability->createOrUpdateWithArray($request->all(), $employee);

			$this->checkStateStoreEmployee($employee, $request);
			$this->destroySessionStoreEmployee();
			DB::commit();

		} catch ( Exception $e ) {
			DB::rollBack();
		}

		return response()->json([
			'status' => true,
			'url'    => '/human-resources/employees'
		]);
	}

	public function checkStateStoreEmployee($employee, $request)
	{
		if ( Session::get('count_certifications') + Session::get('count_specialities') + Session::get('count_professional_licenses') + $request->get('count_disabilities') + $request->get('count_diseases') + $request->get('count_exams') + $request->get('count_family_responsabilities') == 0 )
		{
			return $this->employee->saveStateEnableEmployee($employee);
		}

		return $this->employee->saveStateDisableEmployee($employee);
	}

	public function destroySessionStoreEmployee()
	{
		Session::forget('step1');
		Session::forget('male_surname');
		Session::forget('female_surname');
		Session::forget('first_name');
		Session::forget('second_name');
		Session::forget('rut');
		Session::forget('birthday');
		Session::forget('nationality_id');
		Session::forget('gender_id');
		Session::forget('address');
		Session::forget('depto');
		Session::forget('block');
		Session::forget('num_home');
		Session::forget('region_id');
		Session::forget('province_id');
		Session::forget('commune_id');
		Session::forget('email_employee');
		Session::forget('phone1');
		Session::forget('phone2');
		Session::forget('company_id');
		Session::forget('code');
		Session::forget('count_contacts');
		Session::forget('id_contact');
		Session::forget('contact_relationship_id');
		Session::forget('name_contact');
		Session::forget('email_contact');
		Session::forget('address_contact');
		Session::forget('tel_contact');
		Session::forget('count_family_relationships');
		Session::forget('id_family_relationship');
		Session::forget('relationship_id');
		Session::forget('employee_family_id');
		Session::forget('step2');
		Session::forget('count_studies');
		Session::forget('id_study');
		Session::forget('degree_id');
		Session::forget('name_study');
		Session::forget('institution_study_id');
		Session::forget('date_obtention');
		Session::forget('count_certifications');
		Session::forget('id_certification');
		Session::forget('type_certification_id');
		Session::forget('institution_certification_id');
		Session::forget('emission_certification');
		Session::forget('expired_certification');
		Session::forget('count_specialities');
		Session::forget('id_speciality');
		Session::forget('type_speciality_id');
		Session::forget('institution_speciality_id');
		Session::forget('emission_speciality');
		Session::forget('expired_speciality');
		Session::forget('count_professional_licenses');
		Session::forget('id_professional_license');
		Session::forget('type_professional_license_id');
		Session::forget('emission_license');
		Session::forget('expired_license');
		Session::forget('detail_license');

		for ($i = 0; $i < Session::get('count_professional_licenses'); $i ++)
		{
			Session::forget('is_donor');
		}

		return response()->json([
			'success' => true
		]);
	}

	public function edit($id)
	{
		$employee = $this->employee->find($id);
		$communes = $this->commune->lists('name', 'id');
		$companies = $this->company->whereLists('state', 'enable', 'firm_name');
		$countries = $this->country->lists('name', 'id');
		$degrees = $this->degree->lists('name', 'id');
		$employees = $this->employee->lists('full_name', 'id');
		$genders = $this->gender->lists('name', 'id');
		$institutions = $this->institution->lists('name', 'id');
		$provinces = $this->province->lists('name', 'id');
		$regions = $this->region->lists('name', 'id');
		$relationships = $this->relationship->lists('name', 'id');
		$type_certifications = $this->type_certification->lists('name', 'id');
		$type_disabilities = $this->type_disability->lists('name', 'id');
		$type_diseases = $this->type_disease->lists('name', 'id');
		$type_exams = $this->type_exam->lists('name', 'id');
		$type_professional_licenses = $this->type_professional_license->lists('name', 'id');
		$type_specialities = $this->type_speciality->lists('name', 'id');

		return view('human-resources.employees.edit', compact(
			'employee', 'communes', 'companies', 'countries', 'degrees', 'employees', 'genders', 'institutions',
			'provinces', 'regions', 'relationships', 'type_certifications', 'type_disabilities', 'type_diseases',
			'type_exams', 'type_professional_licenses', 'type_specialities'
		));

	}

	public function update(Step3Request $request, $id)
	{
		DB::beginTransaction();
		try
		{
			$employee = $this->employee->find($id);

			// Update Step1 data
			$this->employee->update($request->session()->get('step1_update'), $id);
			$this->contact_employee->destroyArrayId($request->session()->get('id_delete_contact_update'));
			$this->contact_employee->createOrUpdateWithArray($request->session()->get('step1_update'), $employee);
			$this->family_relationship->destroyArrayId($request->session()->get('id_delete_family_relationship_update'));
			$this->family_relationship->createOrUpdateWithArray($request->session()->get('step1_update'), $employee);

			// Update Step2 data
			$this->study->destroyArrayId($request->session()->get('id_delete_study_update'));
			$this->study->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			$this->certification->destroyImages($request->session()->get('id_delete_certification_update'), 'certification');
			$this->certification->destroyArrayId($request->session()->get('id_delete_certification_update'));
			$this->certification->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			$this->speciality->destroyImages($request->session()->get('id_delete_speciality_update'), 'speciality');
			$this->speciality->destroyArrayId($request->session()->get('id_delete_speciality_update'));
			$this->speciality->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			$this->professionalLicense->destroyImages($request->session()->get('id_delete_professional_license_update'), 'professional_license');
			$this->professionalLicense->destroyArrayId($request->session()->get('id_delete_professional_license_update'));
			$this->professionalLicense->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);

			// Update Step3 data
			$this->disability->destroyImages($request->get('id_delete_disability'), 'disability');
			$this->disability->destroyArrayId($request->get('id_delete_disability'));
			$this->disability->createOrUpdateWithArray($request->all(), $employee);
			$this->disease->destroyImages($request->get('id_delete_disease'), 'disease');
			$this->disease->destroyArrayId($request->get('id_delete_disease'));
			$this->disease->createOrUpdateWithArray($request->all(), $employee);
			$this->exam->destroyImages($request->get('id_delete_exam'), 'exam');
			$this->exam->destroyArrayId($request->get('id_delete_exam'));
			$this->exam->createOrUpdateWithArray($request->all(), $employee);
			$this->family_responsability->destroyImages($request->get('id_delete_family_responsability'), 'family_responsability');
			$this->family_responsability->destroyArrayId($request->get('id_delete_family_responsability'));
			$this->family_responsability->createOrUpdateWithArray($request->all(), $employee);

			$this->employee->checkStateUpdateEmployee($id);
			DB::commit();

		} catch ( Exception $e ) {
			DB::rollBack();
		}

		return response()->json([
			'status' => true,
			'url'    => '/human-resources/employees'
		]);
	}

	public function show($id)
	{
		$employee = $this->employee->find($id, array(
			'commune.province.region', 'contactEmployees.relationship', 'familyRelationships.relationship',
			'studies.degree', 'studies.institution', 'certifications', 'specialities', 'professionalLicenses'
		));

		return view('human-resources.employees.show', compact('employee'));
	}

	public function destroy($id)
	{
		$this->employee->delete($id);

		return redirect()->route('human-resources.employees.index');
	}

	public function getImages($id)
	{
		$employee = $this->employee->find($id, array(
			'certifications.imageCertificationEmployees', 'specialities.imageSpecialityEmployees',
			'professionalLicenses.imageProfessionalLicenseEmployees', 'disabilities.imageDisabilityEmployees',
			'diseases.imageDiseaseEmployees', 'exams.imageExamEmployees',
			'familyResponsabilities.imageFamilyResponsabilityEmployees'
		));

		return view('human-resources.employees.upload', compact('id', 'employee'));
	}

	public function addImages(Request $request)
	{
		$save = $this->image->build($request->get('type'), $request->get('employee_id'), $request->get('repo_id'), $request->file('file_data'))->addImages();

		if ( $save )
		{
			$this->employee->checkStateUpdateEmployee($request->get('employee_id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	public function deleteFiles(Request $request)
	{
		$destroy = $this->image->build($request->get('type'), null, $request->get('key'), null, $request->get('path'))->destroyImage();

		if ( $destroy )
		{
			$this->employee->checkStateUpdateEmployee($request->get('id'));

			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false]);
	}

	public function step1(Step1Request $request)
	{
		Session::put('step1', $request->all());
		Session::put('male_surname', $request->get('male_surname'));
		Session::put('female_surname', $request->get('female_surname'));
		Session::put('first_name', $request->get('first_name'));
		Session::put('second_name', $request->get('second_name'));
		Session::put('rut', $request->get('rut'));
		Session::put('birthday', $request->get('birthday'));
		Session::put('nationality_id', $request->get('nationality_id'));
		Session::put('gender_id', $request->get('gender_id'));
		Session::put('address', $request->get('address'));
		Session::put('depto', $request->get('depto'));
		Session::put('block', $request->get('block'));
		Session::put('num_home', $request->get('num_home'));
		Session::put('region_id', $request->get('region_id'));
		Session::put('province_id', $request->get('province_id'));
		Session::put('commune_id', $request->get('commune_id'));
		Session::put('email_employee', $request->get('email_employee'));
		Session::put('phone1', $request->get('phone1'));
		Session::put('phone2', $request->get('phone2'));
		Session::put('company_id', $request->get('company_id'));
		Session::put('code', $request->get('code'));
		Session::put('count_contacts', $request->get('count_contacts'));
		Session::put('id_contact', $request->get('id_contact'));
		Session::put('contact_relationship_id', $request->get('contact_relationship_id'));
		Session::put('name_contact', $request->get('name_contact'));
		Session::put('email_contact', $request->get('email_contact'));
		Session::put('address_contact', $request->get('address_contact'));
		Session::put('tel_contact', $request->get('tel_contact'));
		Session::put('count_family_relationships', $request->get('count_family_relationships'));
		Session::put('id_family_relationship', $request->get('id_family_relationship'));
		Session::put('relationship_id', $request->get('relationship_id'));
		Session::put('employee_family_id', $request->get('employee_family_id'));

		return response()->json([
			'status' => true
		]);
	}

	public function step2(Step2Request $request)
	{
		Session::put('step2', $request->all());
		Session::put('count_studies', $request->get('count_studies'));
		Session::put('id_study', $request->get('id_study'));
		Session::put('degree_id', $request->get('degree_id'));
		Session::put('name_study', $request->get('name_study'));
		Session::put('institution_study_id', $request->get('institution_study_id'));
		Session::put('date_obtention', $request->get('date_obtention'));
		Session::put('count_certifications', $request->get('count_certifications'));
		Session::put('id_certification', $request->get('id_certification'));
		Session::put('type_certification_id', $request->get('type_certification_id'));
		Session::put('institution_certification_id', $request->get('institution_certification_id'));
		Session::put('emission_certification', $request->get('emission_certification'));
		Session::put('expired_certification', $request->get('expired_certification'));
		Session::put('count_specialities', $request->get('count_specialities'));
		Session::put('id_speciality', $request->get('id_speciality'));
		Session::put('type_speciality_id', $request->get('type_speciality_id'));
		Session::put('institution_speciality_id', $request->get('institution_speciality_id'));
		Session::put('emission_speciality', $request->get('emission_speciality'));
		Session::put('expired_speciality', $request->get('expired_speciality'));
		Session::put('count_professional_licenses', $request->get('count_professional_licenses'));
		Session::put('id_professional_license', $request->get('id_professional_license'));
		Session::put('type_professional_license_id', $request->get('type_professional_license_id'));
		Session::put('emission_license', $request->get('emission_license'));
		Session::put('expired_license', $request->get('expired_license'));
		Session::put('detail_license', $request->get('detail_license'));
		for ($i = 0; $i < $request->get('count_professional_licenses'); $i ++)
		{
			Session::put('is_donor' . $i, $request->get('is_donor' . $i));
		}

		return response()->json([
			'status' => true
		]);
	}

	public function updateSessionStep1(Step1Request $request)
	{
		$request->session()->put('step1_update', $request->all());
		$request->session()->put('id_delete_contact_update', $request->get('id_delete_contact'));
		$request->session()->put('id_delete_family_relationship_update', $request->get('id_delete_family_relationship'));

		return response()->json([
			'status' => true
		]);
	}

	public function updateSessionStep2(Step2Request $request)
	{
		$request->session()->put('step2_update', $request->all());
		$request->session()->put('id_delete_study_update', $request->get('id_delete_study'));
		$request->session()->put('id_delete_certification_update', $request->get('id_delete_certification'));
		$request->session()->put('id_delete_speciality_update', $request->get('id_delete_speciality'));
		$request->session()->put('id_delete_professional_license_update', $request->get('id_delete_professional_license'));

		return response()->json([
			'status' => true
		]);
	}

	public function destroySessionUpdateEmployee(Request $request)
	{
		$request->session()->forget('step1_update');
		$request->session()->forget('id_delete_contact_update');
		$request->session()->forget('id_delete_family_relationship_update');
		$request->session()->forget('step2_update');
		$request->session()->forget('id_delete_study_update');
		$request->session()->forget('id_delete_certification_update');
		$request->session()->forget('id_delete_speciality_update');
		$request->session()->forget('id_delete_professional_license_update');
	}

}
