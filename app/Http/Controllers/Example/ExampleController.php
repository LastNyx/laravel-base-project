<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{

    /*
    |------------------------------
    | Create Controller
    |------------------------------
    |
    | When Making Controller, Please Use this Artisan Command
    |
    | php artisan make:controller Directory/ExampleController --api
    */

    /*
    |------------------------------
    | Response Controller
    |------------------------------
    |
    | When Returning Response, Please Use Response Function.
    |
    | Examples Below
    */


    /*
    public function index()
    {
        $example = Model::paginate(10);

        return $this->SuccessPaginateResponse('Message', $example);
    }
    */

    /*
    public function store(Request $request)
    {

        try{
            $newExample = new Model;
            $newPost->request = $request->request;
            $example->save();
        }catch(\Exception $e){
            return $this->ErrorResponse('Create Failed');
        }

        return $this->SuccessResponse('Create Successfully', $example);

    }
    */

    /*
    public function show($id)
    {
        try{
            $example = Model::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('Not Found');
        }

        return $this->SuccessResponse('Message', $example);
    }
    */

    /*
    public function update(Request $request, $id)
    {
        try{
            $example = Model::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('Not Found');
        }

        try{
            $example->name = $request->name;
            $example->save();
        }catch(\Exception $e){
            return $this->ErrorResponse('Update Failed');
        }

        return $this->SuccessResponse('Updated Successfully', $example);
    }
    */

    /*
    public function destroy($id)
    {
        try{
            $example = Model::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('Not Found');
        }

        try{
            $example->delete();
        }catch(\Exception $e){
            return $this->ErrorResponse('Delete Fail');
        }
        return $this->SuccessResponse('Deleted');
    }
    */
}
