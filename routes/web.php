<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EmployeeManageController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\AttendanceRecordController;
use  App\Http\Controllers\Backend\PersonalDetailsController;
use App\Http\Controllers\Backend\ApplicationController;
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



Route::group(['middleware'=>'employee-auth'],function(){
//employee panel
Route::get('/employee',[EmployeeController::class,'employee'])->name('employee');

//employee panel.personalDetails
Route::get('/employee/personalDetails',[PersonalDetailsController::class,'personalDetails'])->name('personalDetails');

//employee panel.application
Route::get('/employee/application',[ApplicationController::class,'application'])->name('application');
});



Route::group(['middleware'=>'admin-auth'],function(){
//Admin panel
Route::get('/admin',[AdminController::class,'admin'])->name('admin');

//AdminPanel.employeeManage.showDetails
Route::get('/admin/employeeManage',[EmployeeManageController::class,'employeeManage'])->name('employeeManage');

//AdminPanel.employeeManage.employeeCreate
Route::post('/admin/employeeCreate',[EmployeeManageController::class,'employeeCreate'])->name('employeeCreate');

//AdminPanel.employeeManage.employeeDelete
Route::get('/admin/employeeDelete/{id}',[EmployeeManageController::class,'employeeDelete'])->name('employeeDelete');

//AdminPanel.departmentManage
Route::get('/admin/departmentManage',[DepartmentController::class,'departmentManage'])->name('departmentManage');

//AdminPanel.departmentManage.showDetails
Route::post('/admin/departmentManage',[DepartmentController::class,'departmentCreate'])->name('departmentCreate');

//AdminPanel.attendanceRecord
Route::get('/admin/attendanceRecord',[AttendanceRecordController::class,'attendanceRecord'])->name('attendanceRecord');

});
