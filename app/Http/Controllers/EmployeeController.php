<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Exam;
use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\Study;
use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Disease;
use Controlqtime\Core\Entities\Pension;
use Illuminate\Support\Facades\Session;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\Disability;
use Controlqtime\Core\Entities\Speciality;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Http\Requests\Step1Request;
use Controlqtime\Http\Requests\Step2Request;
use Controlqtime\Http\Requests\Step3Request;
use Controlqtime\Core\Entities\Certification;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\ContactEmployee;
use Controlqtime\Core\Entities\ActivateEmployee;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\FamilyRelationship;
use Controlqtime\Core\Entities\ProfessionalLicense;
use Controlqtime\Core\Entities\FamilyResponsability;
use Controlqtime\Notifications\EmployeeWasRegistered;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;

class EmployeeController extends Controller
{
	/**
	 * @var ActivateEmployee
	 */
	protected $activateEmployee;
	
	/**
	 * @var Address
	 */
	protected $address;
	
	/**
	 * @var Certification
	 */
	protected $certification;
	
	/**
	 * @var Commune
	 */
	protected $commune;
	
	/**
	 * @var ContactEmployee
	 */
	protected $contactEmployee;
	
	/**
	 * @var Degree
	 */
	protected $degree;
	
	/**
	 * @var DetailAddressLegalEmployee
	 */
	protected $detailAddress;
	
	/**
	 * @var Disability
	 */
	protected $disability;
	
	/**
	 * @var Disease
	 */
	protected $disease;
	
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * @var Exam
	 */
	protected $exam;
	
	/**
	 * @var FamilyRelationship
	 */
	protected $familyRelationship;
	
	/**
	 * @var FamilyResponsability
	 */
	protected $familyResponsability;
	
	/**
	 * @var Forecast
	 */
	protected $forecast;
	
	/**
	 * @var Institution
	 */
	protected $institution;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var MaritalStatus
	 */
	protected $maritalStatus;
	
	/**
	 * @var Nationality
	 */
	protected $nationality;
	
	/**
	 * @var Pension
	 */
	protected $pension;
	
	/**
	 * @var ProfessionalLicense
	 */
	protected $professionalLicense;
	
	/**
	 * @var Province
	 */
	protected $province;
	
	/**
	 * @var Region
	 */
	protected $region;
	
	/**
	 * @var Relationship
	 */
	protected $relationship;
	
	/**
	 * @var Speciality
	 */
	protected $speciality;
	
	/**
	 * @var Study
	 */
	protected $study;
	
	/**
	 * @var TypeCertification
	 */
	protected $typeCertification;
	
	/**
	 * @var TypeDisability
	 */
	protected $typeDisability;
	
	/**
	 * @var TypeDisease
	 */
	protected $typeDisease;
	
	/**
	 * @var TypeExam
	 */
	protected $typeExam;
	
	/**
	 * @var TypeProfessionalLicense
	 */
	protected $typeProfessionalLicense;
	
	/**
	 * @var TypeSpeciality
	 */
	protected $typeSpeciality;
	
	/**
	 * @var User
	 */
	protected $user;
	
	/**
	 * EmployeeController constructor.
	 *
	 * @param ActivateEmployee           $activateEmployee
	 * @param Address                    $address
	 * @param Certification              $certification
	 * @param Commune                    $commune
	 * @param ContactEmployee            $contactEmployee
	 * @param Degree                     $degree
	 * @param DetailAddressLegalEmployee $detailAddress
	 * @param Disability                 $disability
	 * @param Disease                    $disease
	 * @param Employee                   $employee
	 * @param Exam                       $exam
	 * @param FamilyRelationship         $familyRelationship
	 * @param FamilyResponsability       $familyResponsability
	 * @param Forecast                   $forecast
	 * @param Institution                $institution
	 * @param Log                        $log
	 * @param MaritalStatus              $maritalStatus
	 * @param Nationality                $nationality
	 * @param Pension                    $pension
	 * @param ProfessionalLicense        $professionalLicense
	 * @param Province                   $province
	 * @param Region                     $region
	 * @param Relationship               $relationship
	 * @param Speciality                 $speciality
	 * @param Study                      $study
	 * @param TypeCertification          $typeCertification
	 * @param TypeDisability             $typeDisability
	 * @param TypeDisease                $typeDisease
	 * @param TypeExam                   $typeExam
	 * @param TypeProfessionalLicense    $typeProfessionalLicense
	 * @param TypeSpeciality             $typeSpeciality
	 * @param User                       $user
	 */
	public function __construct(ActivateEmployee $activateEmployee, Address $address, Certification $certification,
		Commune $commune, ContactEmployee $contactEmployee, Degree $degree, DetailAddressLegalEmployee $detailAddress,
		Disability $disability, Disease $disease, Employee $employee, Exam $exam, FamilyRelationship $familyRelationship,
		FamilyResponsability $familyResponsability, Forecast $forecast, Institution $institution, Log $log,
		MaritalStatus $maritalStatus, Nationality $nationality, Pension $pension, ProfessionalLicense $professionalLicense,
		Province $province, Region $region, Relationship $relationship, Speciality $speciality, Study $study,
		TypeCertification $typeCertification, TypeDisability $typeDisability, TypeDisease $typeDisease,
		TypeExam $typeExam, TypeProfessionalLicense $typeProfessionalLicense, TypeSpeciality $typeSpeciality,
		User $user)
	{
		$this->activateEmployee        = $activateEmployee;
		$this->address                 = $address;
		$this->certification           = $certification;
		$this->commune                 = $commune;
		$this->contactEmployee         = $contactEmployee;
		$this->degree                  = $degree;
		$this->detailAddress           = $detailAddress;
		$this->disability              = $disability;
		$this->disease                 = $disease;
		$this->employee                = $employee;
		$this->exam                    = $exam;
		$this->familyRelationship      = $familyRelationship;
		$this->familyResponsability    = $familyResponsability;
		$this->forecast                = $forecast;
		$this->institution             = $institution;
		$this->log                     = $log;
		$this->maritalStatus           = $maritalStatus;
		$this->nationality             = $nationality;
		$this->pension                 = $pension;
		$this->professionalLicense     = $professionalLicense;
		$this->province                = $province;
		$this->region                  = $region;
		$this->relationship            = $relationship;
		$this->speciality              = $speciality;
		$this->study                   = $study;
		$this->typeCertification       = $typeCertification;
		$this->typeDisability          = $typeDisability;
		$this->typeDisease             = $typeDisease;
		$this->typeExam                = $typeExam;
		$this->typeProfessionalLicense = $typeProfessionalLicense;
		$this->typeSpeciality          = $typeSpeciality;
		$this->user                    = $user;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getEmployees()
	{
		$employees = $this->employee->with(['nationality'])->get();
		
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
		$nationalities            = $this->nationality->pluck('name', 'id');
		$degrees                  = $this->degree->pluck('name', 'id');
		$employees                = $this->employee->pluck('full_name', 'id');
		$forecasts                = $this->forecast->pluck('name', 'id');
		$maritalStatuses          = $this->maritalStatus->pluck('name', 'id');
		$institutions             = $this->institution->pluck('name', 'id');
		$pensions                 = $this->pension->pluck('name', 'id');
		$regionsColl              = $this->region->all();
		$provincesColl            = $this->region->findOrFail($regionsColl->first()->id)->provinces;
		$communes                 = $this->province->findOrFail($provincesColl->first()->id)->communes->pluck('name', 'id');
		$regions                  = $regionsColl->pluck('name', 'id');
		$provinces                = $provincesColl->pluck('name', 'id');
		$relationships            = $this->relationship->pluck('name', 'id');
		$typeCertifications       = $this->typeCertification->pluck('name', 'id');
		$typeDisabilities         = $this->typeDisability->pluck('name', 'id');
		$typeDiseases             = $this->typeDisease->pluck('name', 'id');
		$typeExams                = $this->typeExam->pluck('name', 'id');
		$typeProfessionalLicenses = $this->typeProfessionalLicense->pluck('name', 'id');
		$typeSpecialities         = $this->typeSpeciality->pluck('name', 'id');
		
		return view('human-resources.employees.create', compact(
			'communes', 'nationalities', 'degrees', 'employees', 'forecasts', 'maritalStatuses',
			'institutions', 'pensions', 'provinces', 'regions', 'relationships', 'typeCertifications',
			'typeDisabilities', 'typeDiseases', 'typeExams', 'typeProfessionalLicenses', 'typeSpecialities'
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
			$user     = $employee->user()->create([
				'email'    => Session::get('email_employee'),
				'password' => bcrypt(Session::get('email_employee'))
			]);
			
			$address = $employee->address()->create(Session::get('step1'));
			$address->detailAddressLegalEmployee()->create(Session::get('step1'));
			$employee->createContacts(Session::get('step1'));
			$employee->createFamilyRelationships(Session::get('step1'));
			$employee->createStudies(Session::get('step2'));
			$employee->createCertifications(Session::get('step2'));
			$employee->createSpecialities(Session::get('step2'));
			$employee->createLicenses(Session::get('step2'));
			$employee->createDisabilities($request->all());
			$employee->createDiseases($request->all());
			$employee->createExams($request->all());
			$employee->createFamilyResponsabilities($request->all());
			// $user->notify(new EmployeeWasRegistered($employee));
			$this->destroySessionStoreEmployee();
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/human-resources/employees']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Employee: " . $e->getMessage());
			DB::rollBack();
			
			return response()->json(['status' => false]);
		}
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
		Session::forget('is_male');
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
		
		for ( $i = 0; $i < Session::get('count_professional_licenses'); $i++ )
		{
			Session::forget('is_donor');
		}
		
		return response()->json([
			'status' => true
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$employee = $this->employee->with([
			'address.commune.province.region', 'address.detailAddressLegalEmployee',
			'studies.detailCollegeStudy', 'studies.detailSchoolStudy',
			'studies.detailTechnicalStudy', 'studies.detailCollegeStudy.institution'
		])->findOrFail($id);
		
		$nationalities            = $this->nationality->pluck('name', 'id');
		$degrees                  = $this->degree->pluck('name', 'id');
		$employees                = $this->employee->pluck('full_name', 'id');
		$forecasts                = $this->forecast->pluck('name', 'id');
		$maritalStatuses          = $this->maritalStatus->pluck('name', 'id');
		$institutions             = $this->institution->pluck('name', 'id');
		$pensions                 = $this->pension->pluck('name', 'id');
		$regionsColl              = $this->region->all();
		$provincesColl            = $this->region->findOrFail($employee->address->commune->province->region->id)->provinces;
		$communes                 = $this->province->findOrFail($id)->communes->pluck('name', 'id');
		$regions                  = $regionsColl->pluck('name', 'id');
		$provinces                = $provincesColl->pluck('name', 'id');
		$relationships            = $this->relationship->pluck('name', 'id');
		$typeCertifications       = $this->typeCertification->pluck('name', 'id');
		$typeDisabilities         = $this->typeDisability->pluck('name', 'id');
		$typeDiseases             = $this->typeDisease->pluck('name', 'id');
		$typeExams                = $this->typeExam->pluck('name', 'id');
		$typeProfessionalLicenses = $this->typeProfessionalLicense->pluck('name', 'id');
		$typeSpecialities         = $this->typeSpeciality->pluck('name', 'id');
		
		return view('human-resources.employees.edit', compact(
			'employee', 'communes', 'nationalities', 'degrees', 'employees', 'maritalStatuses',
			'forecasts', 'pensions', 'institutions', 'provinces', 'regions', 'relationships',
			'typeCertifications', 'typeDisabilities', 'typeDiseases', 'typeExams', 'typeProfessionalLicenses',
			'typeSpecialities'
		));
	}
	
	/**
	 * @param Step3Request $request
	 * @param              $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(Step3Request $request, $id)
	{
		DB::beginTransaction();
		
		try
		{
			// Update Step1 data
			$employee = $this->employee->findOrFail($id);
			$employee->fill(Session::get('step1_update'))->saveOrFail();
			$employee->user->update(['email' => Session::get('step1_update.email_employee')]);
			$employee->address->update(Session::get('step1_update'));
			$employee->address->detailAddressLegalEmployee->update(Session::get('step1_update'));
			// $employee->createContacts()->destroyArrayId(Session::get('id_delete_contact_update'), '');
			$employee->createContacts(Session::get('step1_update'));
			// $this->familyRelationship->destroyArrayId($request->session()->get('id_delete_family_relationship_update'), '');
			$employee->createFamilyRelationships(Session::get('step1_update'));
			
			// Update Step2 data
			// $this->study->destroyArrayId($request->session()->get('id_delete_study_update'), '');
			$employee->createStudies(Session::get('step2_update'));
			// $this->certification->destroyImages($request->session()->get('id_delete_certification_update'), 'Certification');
			// $this->certification->destroyArrayId($request->session()->get('id_delete_certification_update'), 'Certification');
			$employee->createCertifications(Session::get('step2_update'));
			// $this->speciality->destroyImages($request->session()->get('id_delete_speciality_update'), 'Speciality');
			// $this->speciality->destroyArrayId($request->session()->get('id_delete_speciality_update'), 'Speciality');
			$employee->createSpecialities(Session::get('step2_update'));
			// $this->professionalLicense->destroyImages($request->session()->get('id_delete_professional_license_update'), 'ProfessionalLicense');
			// $this->professionalLicense->destroyArrayId($request->session()->get('id_delete_professional_license_update'), 'ProfessionalLicense');
			$employee->createLicenses(Session::get('step2_update'));
			
			// Update Step3 data
			// $this->disability->destroyImages($request->get('id_delete_disability'), 'Disability');
			// $this->disability->destroyArrayId($request->get('id_delete_disability'), 'Disability');
			$employee->createDisabilities($request->all());
			// $this->disease->destroyImages($request->get('id_delete_disease'), 'Disease');
			// $this->disease->destroyArrayId($request->get('id_delete_disease'), 'Disease');
			$employee->createDiseases($request->all());
			// $this->exam->destroyImages($request->get('id_delete_exam'), 'Exam');
			// $this->exam->destroyArrayId($request->get('id_delete_exam'), 'Exam');
			$employee->createExams($request->all());
			// $this->familyResponsability->destroyImages($request->get('id_delete_family_responsability'), 'FamilyResponsability');
			// $this->familyResponsability->destroyArrayId($request->get('id_delete_family_responsability'), 'FamilyResponsability');
			$employee->createFamilyResponsabilities($request->all());
			$this->activateEmployee->checkStateUpdateEmployee($id);
			/* @todo Fixed $user value. Actually is boolean not object */
			// $user->notify(new EmployeeWasRegistered($employee));
			/* @todo destroy session data update */
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/human-resources/employees']);
		} catch ( Exception $e )
		{
			$this->log->error("Error update Employee: " . $e->getMessage());
			DB::rollBack();
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$employee = $this->employee->with([
			'pension', 'forecast', 'address.commune.province.region', 'contactEmployees.relationship',
			'familyRelationships.relationship', 'address.detailAddressLegalEmployee', 'studies.degree',
			'studies.detailCollegeStudy.institution', 'studies.detailSchoolStudy', 'studies.detailTechnicalStudy',
			'certifications.imagesable', 'specialities.imagesable', 'professionalLicenses.imagesable',
			'disabilities.imagesable', 'diseases.imagesable', 'exams.imagesable',
			'familyResponsabilities.imagesable'
		])->findOrFail($id);
		
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
			$employee = $this->employee->findOrFail($id);
			$this->activateEmployee->saveStateDisableEmployee($employee);
			// $employee->address->delete();
			$employee->delete($id);
			
			DB::commit();
		} catch ( Exception $e )
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
		$employee = $this->employee->with([
			'certifications.imagesable', 'specialities.imagesable', 'professionalLicenses.imagesable',
			'disabilities.imagesable', 'diseases.imagesable', 'exams.imagesable'
		])->findOrFail($id);
		
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
		
		if ( $save )
		{
			$this->activateEmployee->checkStateUpdateEmployee($request->get('employee_id'));
			
			return response()->json([
				'status' => true
			]);
		}
		
		return response()->json([
			'status' => false
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
		
		if ( $destroy )
		{
			$this->activateEmployee->checkStateUpdateEmployee($request->get('id'));
			
			return response()->json([
				'status' => true
			]);
		}
		
		return response()->json([
			'status' => false
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
		Session::put('is_male', $request->get('is_male'));
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
		
		for ( $i = 0; $i < $request->get('count_professional_licenses'); $i++ )
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
