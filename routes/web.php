<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EmployeeManageController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\AttendanceRecordController;
use  App\Http\Controllers\Backend\PersonalDetailsController;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\backend\attendanceController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\LeaveManageCOntroller;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\SalaryManageController;
use App\Http\Controllers\Backend\signInController;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home panel
Route::get('/',[UserController::class,'logIn'])->name('logIn');

//home panel
Route::get('/employeeDetails',[EmployeeController::class,'employeeDetails'])->name('employeeDetails');

//home panel
Route::get('/signIn',[signInController::class,'signIn'])->name('signIn');

//authentication
Route::post('/authenticate',[UserController::class,'authenticate'])->name('authenticate');

//home panel
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


//attendance
Route::post('/attendance',[attendanceController::class,'attendance'])->name('attendance');


Route::group(['middleware'=>'employee-auth'],function(){
//employee panel
Route::get('/employee',[EmployeeController::class,'employee'])->name('employee');

//employee panel.personalDetails
Route::get('/employee/personalDetails',[PersonalDetailsController::class,'personalDetails'])->name('personalDetails');

//employee panel.application
Route::get('/employee/application',[ApplicationController::class,'application'])->name('application');

//employee panel.applicationCreate
Route::post('/employee/applicationCreate',[ApplicationController::class,'applicationCreate'])->name('applicationCreate');

//employee Panel.accountDetails
Route::get('/employee/accountDetails',[SalaryManageController::class,'accountDetails'])->name('accountDetails');

//employee panel.attendanceRecord
Route::get('/employee/attendanceRecord',[AttendanceRecordController::class,'employeeAttendance'])->name('employeeAttendance');

//employee panel.leaveDetails
Route::get('/employee/leaveDetails',[NotificationController::class,'leaveDetails'])->name('leaveDetails');

//employee panel.notification
Route::get('/employee/notification',[NotificationController::class,'employeeNotification'])->name('employeeNotification');
});



Route::group(['middleware'=>'admin-auth'],function(){


Route::post('/employee/accept/application/{id}',[ApplicationController::class,'handleStatus'])->name('acceptApplication');

Route::post('/employee/decline/application/{id}',[ApplicationController::class,'handleStatusDecline'])->name('declineApplication');

// Route::post('/employee/decline/application/{id}',[ApplicationController::class,'handleStatusDecline'])->name('declineApplication');

//Admin panel
Route::get('/admin',[AdminController::class,'admin'])->name('admin');

//AdminPanel.employeeManage.showDetails
Route::get('/admin/employeeManage',[EmployeeManageController::class,'employeeManage'])->name('employeeManage');

//AdminPanel.employeeManage.search
Route::get('/admin/employeeManage/search',[EmployeeManageController::class,'search'])->name('employees.search');

//AdminPanel.employeeManage.employeeCreate
Route::post('/admin/employeeCreate',[EmployeeManageController::class,'employeeCreate'])->name('employeeCreate');

//AdminPanel.employeeManage.employeeEdit
Route::get('/admin/employeeEdit/{id}',[EmployeeManageController::class,'employeeEdit'])->name('employeeEdit');

//AdminPanel.employeeManage.employeeUpdate
Route::post('/admin/employeeUpdate/{id}',[EmployeeManageController::class,'employeeUpdate'])->name('employeeUpdate');

//AdminPanel.employeeManage.employeeDelete
Route::get('/admin/employeeDelete/{id}',[EmployeeManageController::class,'employeeDelete'])->name('employeeDelete');

//AdminPanel.departmentManage
Route::get('/admin/departmentManage',[DepartmentController::class,'departmentManage'])->name('departmentManage');

//AdminPanel.departmentManage.showDetails
Route::post('/admin/departmentCreate',[DepartmentController::class,'departmentCreate'])->name('departmentCreate');

//AdminPanel.departmentManage.departmentEdit
Route::get('/admin/departmentEdit/{id}',[DepartmentController::class,'departmentEdit'])->name('departmentEdit');

//AdminPanel.departmentManage.departmentUpdate
Route::post('/admin/departmentUpdate/{id}',[DepartmentController::class,'departmentUpdate'])->name('departmentUpdate');

//AdminPanel.designationManage
Route::get('/admin/designationManage',[DesignationController::class,'designationManage'])->name('designationManage');

//AdminPanel.designationManage.showDetails
Route::post('/admin/designationCreate',[DesignationController::class,'designationCreate'])->name('designationCreate');

//AdminPanel.designationManage.designationEdit
Route::get('/admin/designationEdit/{id}',[DesignationController::class,'designationEdit'])->name('designationEdit');

//AdminPanel.designationManage.designationUpdate
Route::post('/admin/designationUpdate/{id}',[DesignationController::class,'designationUpdate'])->name('designationUpdate');

//AdminPanel.salaryManage
Route::get('/admin/salaryManage',[SalaryManageController::class,'salaryManage'])->name('salaryManage');

//AdminPanel.salaryManage.shoeDetails
Route::post('/admin/salaryCreate',[SalaryManageController::class,'salaryCreate'])->name('salaryCreate');

//AdminPanel.attendanceRecord
Route::get('/admin/attendanceRecord',[AttendanceRecordController::class,'attendanceRecord'])->name('attendanceRecord');

//AdminPanel.notification
Route::get('/admin/notification',[NotificationController::class,'notification'])->name('notification');

//AdminPanel.ApplicationAccept
Route::get('/admin/applicationAccept/{id}/{user_id?}',[NotificationController::class,'applicationAccept'])->name('ApplicationAccept');

//AdminPanel.ApplicationDecline
Route::get('/admin/applicationDecline/{id}',[NotificationController::class,'applicationDecline'])->name('ApplicationDecline');

//AdminPanel.LeaveManage
Route::get('/admin/leaveManage',[LeaveManageCOntroller::class,'leaveManage'])->name('LeaveManage');


//AdminPanel.report
Route::get('/admin/report',[AttendanceRecordController::class,'report'])->name('report');

});
