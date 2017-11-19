<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use DateTime;
use DateTimeZone;

class SubmissionController extends Controller
{

  /**
   * @param Request $request
   * @return void
   */
  public function saveSubmission(Request $request){
      $this->validate($request, [
        'image_file' => 'required|image',
      ]);

      $submission = new Submission($request->all());

      // get current time and append the upload file extension to it,
      // then put that name to $photoName variable.
      $fileName = time().'.'.$request->image_file->getClientOriginalExtension();

      /*
      talk the select file and move it public directory and make avatars
      folder if doesn't exist then give it that unique name.
      */
      $request->image_file->move(public_path('uploads'), $fileName);
      $submission->image_url = "uploads/".$fileName;
      //$submission->created_date = new DateTime(null, new DateTimeZone('Africa/Lagos'));
      $submission->save();

      return back()->with('success','Image Uploaded successfully');
  }
}
