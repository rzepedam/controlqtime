<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Country;
use Illuminate\Support\Facades\Session;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Http\Requests\Step1Request;
use Controlqtime\Http\Requests\Step2Request;
use Controlqtime\Http\Requests\Step3Request;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Entities\ActivateEmployee;
use Controlqtime\Core\Contracts\ExamRepoInterface;
use Controlqtime\Core\Contracts\UserRepoInterface;
use Controlqtime\Core\Contracts\StudyRepoInterface;
use Controlqtime\Core\Contracts\DegreeRepoInterface;
use Controlqtime\Core\Contracts\GenderRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\AddressRepoInterface;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\DiseaseRepoInterface;
use Controlqtime\Core\Contracts\PensionRepoInterface;
use Controlqtime\Notifications\EmployeeWasRegistered;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\TypeExamRepoInterface;
use Controlqtime\Core\Contracts\DisabilityRepoInterface;
use Controlqtime\Core\Contracts\SpecialityRepoInterface;
use Controlqtime\Core\Contracts\TypeDiseaseRepoInterface;
use Controlqtime\Core\Contracts\RelationshipRepoInterface;
use Controlqtime\Core\Contracts\CertificationRepoInterface;
use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;
use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;
use Controlqtime\Core\Contracts\ContactEmployeeRepoInterface;
use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;
use Controlqtime\Core\Contracts\FamilyRelationshipRepoInterface;
use Controlqtime\Core\Contracts\ProfessionalLicenseRepoInterface;
use Controlqtime\Core\Contracts\FamilyResponsabilityRepoInterface;
use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;
use Controlqtime\Core\Contracts\DetailAddressLegalEmployeeRepoInterface;

class EmployeeController extends Controller
{
	/**
	 * @var ActivateEmployee
	 */
	protected $activateEmployee;
	
	/**
	 * @var AddressRepoInterface
	 */
	protected $address;
	
	/**
	 * @var CertificationRepoInterface
	 */
	protected $certification;
	
	/**
	 * @var CommuneRepoInterface
	 */
	protected $commune;
	
	/**
	 * @var ContactEmployeeRepoInterface
	 */
	protected $contact_employee;
	
	/**
	 * @var Country
	 */
	protected $country;
	
	/**
	 * @var DegreeRepoInterface
	 */
	protected $degree;
	
	/**
	 * @var DetailAddressLegalEmployeeRepoInterface
	 */
	protected $detail_address;
	
	/**
	 * @var DisabilityRepoInterface
	 */
	protected $disability;
	
	/**
	 * @var DiseaseRepoInterface
	 */
	protected $disease;
	
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * @var ExamRepoInterface
	 */
	protected $exam;
	
	/**
	 * @var FamilyRelationshipRepoInterface
	 */
	protected $family_relationship;
	
	/**
	 * @var FamilyResponsabilityRepoInterface
	 */
	protected $family_responsability;
	
	/**
	 * @var Forecast
	 */
	protected $forecast;
	
	/**
	 * @var GenderRepoInterface
	 */
	protected $gender;
	
	/**
	 * @var Institution
	 */
	protected $institution;
	
	/**
	 * @var MaritalStatus
	 */
	protected $maritalStatus;
	
	/**
	 * @var PensionRepoInterface
	 */
	protected $pension;
	
	/**
	 * @var ProfessionalLicenseRepoInterface
	 */
	protected $professionalLicense;
	
	/**
	 * @var ProvinceRepoInterface
	 */
	protected $province;
	
	/**
	 * @var RegionRepoInterface
	 */
	protected $region;
	
	/**
	 * @var RelationshipRepoInterface
	 */
	protected $relationship;
	
	/**
	 * @var SpecialityRepoInterface
	 */
	protected $speciality;
	
	/**
	 * @var StudyRepoInterface
	 */
	protected $study;
	
	/**
	 * @var TypeCertificationRepoInterface
	 */
	protected $type_certification;
	
	/**
	 * @var TypeDisabilityRepoInterface
	 */
	protected $type_disability;
	
	/**
	 * @var TypeDiseaseRepoInterface
	 */
	protected $type_disease;
	
	/**
	 * @var TypeExamRepoInterface
	 */
	protected $type_exam;
	
	/**
	 * @var TypeProfessionalLicenseRepoInterface
	 */
	protected $type_professional_license;
	
	/**
	 * @var TypeSpecialityRepoInterface
	 */
	protected $type_speciality;
	
	/**
	 * @var UserRepoInterface
	 */
	protected $user;
	
	/**
	 * EmployeeController constructor.
	 *
	 * @param ActivateEmployee                        $activateEmployee
	 * @param Country                                 $country
	 * @param GenderRepoInterface                     $gender
	 * @param RegionRepoInterface                     $region
	 * @param ProvinceRepoInterface                   $province
	 * @param CommuneRepoInterface                    $commune
	 * @param RelationshipRepoInterface               $relationship
	 * @param DegreeRepoInterface                     $degree
	 * @param Employee                                $employee
	 * @param Forecast                                $forecast
	 * @param Institution                             $institution
	 * @param MaritalStatus                           $maritalStatus
	 * @param TypeCertificationRepoInterface          $type_certification
	 * @param TypeSpecialityRepoInterface             $type_speciality
	 * @param TypeProfessionalLicenseRepoInterface    $type_professional_license
	 * @param TypeDisabilityRepoInterface             $type_disability
	 * @param TypeDiseaseRepoInterface                $type_disease
	 * @param TypeExamRepoInterface                   $type_exam
	 * @param FamilyRelationshipRepoInterface         $family_relationship
	 * @param StudyRepoInterface                      $study
	 * @param CertificationRepoInterface              $certification
	 * @param SpecialityRepoInterface                 $speciality
	 * @param ProfessionalLicenseRepoInterface        $professionalLicense
	 * @param DisabilityRepoInterface                 $disability
	 * @param DiseaseRepoInterface                    $disease
	 * @param ExamRepoInterface                       $exam
	 * @param FamilyResponsabilityRepoInterface       $family_responsability
	 * @param ContactEmployeeRepoInterface            $contact_employee
	 * @param PensionRepoInterface                    $pension
	 * @param UserRepoInterface                       $user
	 * @param AddressRepoInterface                    $address
	 * @param DetailAddressLegalEmployeeRepoInterface $detail_address
	 */
	public function __construct(ActivateEmployee $activateEmployee, Country $country, GenderRepoInterface $gender, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune,
		RelationshipRepoInterface $relationship, DegreeRepoInterface $degree, Employee $employee, Forecast $forecast,
		Institution $institution, MaritalStatus $maritalStatus, TypeCertificationRepoInterface $type_certification, TypeSpecialityRepoInterface $type_speciality,
		TypeProfessionalLicenseRepoInterface $type_professional_license, TypeDisabilityRepoInterface $type_disability, TypeDiseaseRepoInterface $type_disease, TypeExamRepoInterface $type_exam,
		FamilyRelationshipRepoInterface $family_relationship, StudyRepoInterface $study, CertificationRepoInterface $certification, SpecialityRepoInterface $speciality, ProfessionalLicenseRepoInterface $professionalLicense,
		DisabilityRepoInterface $disability, DiseaseRepoInterface $disease, ExamRepoInterface $exam,
		FamilyResponsabilityRepoInterface $family_responsability, ContactEmployeeRepoInterface $contact_employee,
		PensionRepoInterface $pension, UserRepoInterface $user, AddressRepoInterface $address, DetailAddressLegalEmployeeRepoInterface $detail_address)
	{
		$this->activateEmployee          = $activateEmployee;
		$this->address                   = $address;
		$this->certification             = $certification;
		$this->commune                   = $commune;
		$this->contact_employee          = $contact_employee;
		$this->country                   = $country;
		$this->degree                    = $degree;
		$this->detail_address            = $detail_address;
		$this->disability                = $disability;
		$this->disease                   = $disease;
		$this->employee                  = $employee;
		$this->exam                      = $exam;
		$this->family_relationship       = $family_relationship;
		$this->family_responsability     = $family_responsability;
		$this->forecast                  = $forecast;
		$this->gender                    = $gender;
		$this->institution               = $institution;
		$this->maritalStatus             = $maritalStatus;
		$this->pension                   = $pension;
		$this->professionalLicense       = $professionalLicense;
		$this->province                  = $province;
		$this->region                    = $region;
		$this->relationship              = $relationship;
		$this->speciality                = $speciality;
		$this->study                     = $study;
		$this->type_certification        = $type_certification;
		$this->type_disability           = $type_disability;
		$this->type_disease              = $type_disease;
		$this->type_exam                 = $type_exam;
		$this->type_professional_license = $type_professional_license;
		$this->type_speciality           = $type_speciality;
		$this->user                      = $user;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getEmployees()
	{
		$employees = $this->employee->all(['nationality']);
		
		return $employees;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('human-resources.employees.index');
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$countries                  = $this->country->lists('name', 'id');
		$degrees                    = $this->degree->lists('name', 'id');
		$employees                  = $this->employee->lists('full_name', 'id');
		$forecasts                  = $this->forecast->lists('name', 'id');
		$genders                    = $this->gender->lists('name', 'id');
		$maritalStatuses            = $this->maritalStatus->lists('name', 'id');
		$institutions               = $this->institution->lists('name', 'id');
		$pensions                   = $this->pension->lists('name', 'id');
		$regionsColl                = $this->region->all();
		$provincesColl              = $this->region->find($regionsColl->first()->id)->provinces;
		$communes                   = $this->province->findCommunes($provincesColl->first()->id);
		$regions                    = $regionsColl->pluck('name', 'id');
		$provinces                  = $provincesColl->pluck('name', 'id');
		$relationships              = $this->relationship->lists('name', 'id');
		$type_certifications        = $this->type_certification->lists('name', 'id');
		$type_disabilities          = $this->type_disability->lists('name', 'id');
		$type_diseases              = $this->type_disease->lists('name', 'id');
		$type_exams                 = $this->type_exam->lists('name', 'id');
		$type_professional_licenses = $this->type_professional_license->lists('name', 'id');
		$type_specialities          = $this->type_speciality->lists('name', 'id');
		
		return view('human-resources.employees.create', compact(
			'communes', 'countries', 'degrees', 'employees', 'forecasts', 'maritalStatuses',
			'genders', 'institutions', 'pensions', 'provinces', 'regions', 'relationships',
			'type_certifications', 'type_disabilities', 'type_diseases', 'type_exams',
			'type_professional_licenses', 'type_specialities'
		));
		
	}
	
	/**
	 * @param Step3Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Step3Request $request)
	{
		DB::beginTransaction();
		
		try
		{
			$employee = $this->employee->create(Session::get('step1'));
			$user    = $employee->user()->create([
				'email'    => Session::get('email_employee'),
				'password' => bcrypt(Session::get('email_employee'))
			]);
			$address = $employee->address()->create(Session::get('step1'));
			$address->detailAddressLegalEmployee()->create(Session::get('step1'));
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
			
			$user->notify(new EmployeeWasRegistered($employee));
			$this->destroySessionStoreEmployee();
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollBack();
		}
		
		return response()->json([
			'status' => true,
			'url'    => '/human-resources/employees'
		]);
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
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
		Session::forget('marital_status_id');
		Session::forget('forecast_id');
		Session::forget('pension_id');
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
		
		for ($i = 0; $i < Session::get('count_professional_licenses'); $i++)
		{
			Session::forget('is_donor');
		}
		
		return response()->json([
			'success' => true
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$employee                   = $this->employee->find($id, [
			'address.commune.province.region', 'address.detailAddressLegalEmployee',
			'studies.detailCollegeStudy', 'studies.detailSchoolStudy',
			'studies.detailTechnicalStudy', 'studies.detailCollegeStudy.institution'
		]);
		
		$countries                  = $this->country->lists('name', 'id');
		$degrees                    = $this->degree->lists('name', 'id');
		$employees                  = $this->employee->lists('full_name', 'id');
		$forecasts                  = $this->forecast->lists('name', 'id');
		$genders                    = $this->gender->lists('name', 'id');
		$maritalStatuses            = $this->maritalStatus->lists('name', 'id');
		$institutions               = $this->institution->lists('name', 'id');
		$pensions                   = $this->pension->lists('name', 'id');
		$regionsColl                = $this->region->all();
		$provincesColl              = $this->region->find($employee->address->commune->province->region->id)->provinces;
		$communes                   = $this->province->findCommunes($employee->address->commune->province->id);
		$regions                    = $regionsColl->pluck('name', 'id');
		$provinces                  = $provincesColl->pluck('name', 'id');
		$relationships              = $this->relationship->lists('name', 'id');
		$type_certifications        = $this->type_certification->lists('name', 'id');
		$type_disabilities          = $this->type_disability->lists('name', 'id');
		$type_diseases              = $this->type_disease->lists('name', 'id');
		$type_exams                 = $this->type_exam->lists('name', 'id');
		$type_professional_licenses = $this->type_professional_license->lists('name', 'id');
		$type_specialities          = $this->type_speciality->lists('name', 'id');
		
		return view('human-resources.employees.edit', compact(
			'employee', 'communes', 'countries', 'degrees', 'employees', 'genders',
			'maritalStatuses', 'forecasts', 'pensions', 'institutions', 'provinces', 'regions',
			'relationships', 'type_certifications', 'type_disabilities', 'type_diseases', 'type_exams',
			'type_professional_licenses', 'type_specialities'
		));
	}
	
	/**
	 * @param Step3Request $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(Step3Request $request, $id)
	{
		DB::beginTransaction();
		
		try
		{
			// Update Step1 data
			$employee = $this->employee->update($request->session()->get('step1_update'), $id);
			$user     = $this->user->update(['email' => $request->session()->get('step1_update.email_employee')], $employee->user->id);
			$address  = $this->address->update($request->session()->get('step1_update'), $employee->address->id);
			$this->detail_address->update($request->session()->get('step1_update'), $address->detailAddressLegalEmployee->id);
			$this->contact_employee->destroyArrayId($request->session()->get('id_delete_contact_update'), '');
			$this->contact_employee->createOrUpdateWithArray($request->session()->get('step1_update'), $employee);
			$this->family_relationship->destroyArrayId($request->session()->get('id_delete_family_relationship_update'), '');
			$this->family_relationship->createOrUpdateWithArray($request->session()->get('step1_update'), $employee);
			
			// Update Step2 data
			$this->study->destroyArrayId($request->session()->get('id_delete_study_update'), '');
			$this->study->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			$this->certification->destroyImages($request->session()->get('id_delete_certification_update'), 'Certification');
			$this->certification->destroyArrayId($request->session()->get('id_delete_certification_update'), 'Certification');
			$this->certification->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			$this->speciality->destroyImages($request->session()->get('id_delete_speciality_update'), 'Speciality');
			$this->speciality->destroyArrayId($request->session()->get('id_delete_speciality_update'), 'Speciality');
			$this->speciality->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			$this->professionalLicense->destroyImages($request->session()->get('id_delete_professional_license_update'), 'ProfessionalLicense');
			$this->professionalLicense->destroyArrayId($request->session()->get('id_delete_professional_license_update'), 'ProfessionalLicense');
			$this->professionalLicense->createOrUpdateWithArray($request->session()->get('step2_update'), $employee);
			
			// Update Step3 data
			$this->disability->destroyImages($request->get('id_delete_disability'), 'Disability');
			$this->disability->destroyArrayId($request->get('id_delete_disability'), 'Disability');
			$this->disability->createOrUpdateWithArray($request->all(), $employee);
			$this->disease->destroyImages($request->get('id_delete_disease'), 'Disease');
			$this->disease->destroyArrayId($request->get('id_delete_disease'), 'Disease');
			$this->disease->createOrUpdateWithArray($request->all(), $employee);
			$this->exam->destroyImages($request->get('id_delete_exam'), 'Exam');
			$this->exam->destroyArrayId($request->get('id_delete_exam'), 'Exam');
			$this->exam->createOrUpdateWithArray($request->all(), $employee);
			$this->family_responsability->destroyImages($request->get('id_delete_family_responsability'), 'FamilyResponsability');
			$this->family_responsability->destroyArrayId($request->get('id_delete_family_responsability'), 'FamilyResponsability');
			$this->family_responsability->createOrUpdateWithArray($request->all(), $employee);
			$this->activateEmployee->checkStateUpdateEmployee($id);
			
			// $user->notify(new EmployeeWasRegistered($employee));
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollBack();
		}
		
		return response()->json([
			'status' => true,
			'url'    => '/human-resources/employees'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$employee = $this->employee->find($id, [
			'pension', 'forecast', 'address.commune.province.region', 'contactEmployees.relationship',
			'familyRelationships.relationship', 'address.detailAddressLegalEmployee', 'studies.degree',
			'studies.detailCollegeStudy.institution', 'studies.detailSchoolStudy', 'studies.detailTechnicalStudy',
			'certifications.imagesable', 'specialities.imagesable', 'professionalLicenses.imagesable',
			'disabilities.imagesable', 'diseases.imagesable', 'exams.imagesable',
			'familyResponsabilities.imagesable'
		]);
		
		return view('human-resources.employees.show', compact('employee'));
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		DB::beginTransaction();
		
		try
		{
			$employee = $this->employee->find($id);
			$this->activateEmployee->saveStateDisableEmployee($employee);
			$this->employee->delete($id);
			
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollback();
		}
		
		return redirect()->route('employees.index');
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getImages($id)
	{
		$employee = $this->employee->find($id, [
			'certifications.imagesable', 'specialities.imagesable', 'professionalLicenses.imagesable',
			'disabilities.imagesable', 'diseases.imagesable', 'exams.imagesable'
		]);
		
		return view('human-resources.employees.upload', compact('id', 'employee'));
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function addImages(Request $request)
	{
		$save = new ImageFactory($request->get('employee_id'), 'employee/', $request->get('repo_id'), $request->get('type'), $request->file('file_data'), null, $request->get('subClass'));
		
		if ($save)
		{
			$this->activateEmployee->checkStateUpdateEmployee($request->get('employee_id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function deleteFiles(Request $request)
	{
		$destroy = new ImageFactory($request->get('key'), 'employee/', null, $request->get('type'), null, $request->get('path'));
		
		if ($destroy)
		{
			$this->activateEmployee->checkStateUpdateEmployee($request->get('id'));
			
			return response()->json([
				'success' => true
			]);
		}
		
		return response()->json([
			'success' => false
		]);
	}
	
	/**
	 * @param Step1Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
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
		Session::put('marital_status_id', $request->get('marital_status_id'));
		Session::put('forecast_id', $request->get('forecast_id'));
		Session::put('pension_id', $request->get('pension_id'));
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
	
	/**
	 * @param Step2Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function step2(Step2Request $request)
	{
		Session::put('step2', $request->all());
		Session::put('count_studies', $request->get('count_studies'));
		Session::put('id_study', $request->get('id_study'));
		Session::put('degree_id', $request->get('degree_id'));
		Session::put('name_study', $request->get('name_study'));
		Session::put('name_institution', $request->get('name_institution'));
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
		
		for ($i = 0; $i < $request->get('count_professional_licenses'); $i++)
		{
			Session::put('is_donor' . $i, $request->get('is_donor' . $i));
		}
		
		return response()->json([
			'status' => true
		]);
	}
	
	/**
	 * @param Step1Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updateSessionStep1(Step1Request $request)
	{
		$request->session()->put('step1_update', $request->all());
		$request->session()->put('id_delete_contact_update', $request->get('id_delete_contact'));
		$request->session()->put('id_delete_family_relationship_update', $request->get('id_delete_family_relationship'));
		
		return response()->json([
			'status' => true
		]);
	}
	
	/**
	 * @param Step2Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
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
	
	/**
	 * @param Request $request
	 */
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
