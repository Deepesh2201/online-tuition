<?php

namespace App\Http\Controllers;

use App\Models\batches;
use App\Models\classschedule;
use App\Models\zoom_classes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\Http;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use App\Models\access_token;
use App\Models\SlotBooking;
use App\Models\attendance;
use App\Models\students\studentattendance;
use App\Models\subjects;
use App\Models\topics;
use GuzzleHttp\Client;

class ZoomClassesController extends Controller
{
    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            // $tokenurl = parse_url(url()->full(), PHP_URL_QUERY);
            // $access_code = substr($tokenurl, 5);
            // $accessToken = "";
            // $accountID = 'metacitinasar@gmail.com';
            // $clientId = 'oFed_e_zQi6wE8183XRI0A';
            // $clientSecret = '1hYXjFPAXUJ8uYOQDUGTJJNjzVGdaxTu';

            // $url = 'https://zoom.us/oauth/token';

            // $client = new Client();

            // $headers = [
            //     'Host' => 'zoom.us',
            //     'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
            // ];

            // $formData = [
            //     'grant_type' => 'authorization_code',
            //     'account_id' => $accountID,
            //     'code' => $access_code,
            //     'redirect_uri' => 'http://127.0.0.1:8000/tutor/liveclass',
            // ];

            // try {
            //     $response = $client->post($url, [
            //         'headers' => $headers,
            //         'form_params' => $formData,
            //     ]);

            //     $data = json_decode($response->getBody(), true);
            //     // Now you can access the Zoom access token from the response data.
            //     $accessToken = $data['access_token'];

            //     // You can return or process the access token as needed.
            //     // echo $accessToken;
            //     // return $accessToken;
            // } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            //     // Handle any exceptions or errors here.
            //     // For example, you can log the error or throw a custom exception.
            //     // Note: Don't forget to handle the error cases appropriately in a production environment.
            //     // return null;
            //     // return null;
            // }

            // if ($accessToken) {

            //     $setdata = access_token::select('*')->where('user_id', session('userid')->id)->first();
            //     if ($setdata) {
            //         $setdata = access_token::find($setdata->id);
            //         $setdata->authorization_code = $access_code;
            //         $setdata->access_token = $accessToken;
            //         $setdata->save();
            //         // $accessToken = $setdata->access_token;
            //     } else {
            //         $setdata = new access_token();
            //         $setdata->user_id = session('userid')->id;
            //         $setdata->authorization_code = $access_code;
            //         $setdata->access_token = $accessToken;
            //         // $setdata->refresh_token = $refreshToken;
            //         $setdata->save();
            //     }
            // }
            //////////////////   // Getting Admin Details
            // $url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com';

            // $client = new Client();

            // $headers = [
            //     'Authorization' => 'Bearer '.$accessToken,
            // ];
            // $response = $client->get($url, [
            //     'headers' => $headers,
            // ]);

            // $data = json_decode($response->getBody(), true);
            // $tempdata = access_token::select('*')->where('user_id', session('userid')->id)->first();
            // // Getting Meeting List Details
            // $url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com/meetings?type=scheduled&page_size=30&page_number=1';
            // $client = new Client();
            // $headers = [
            //     'Authorization' => 'Bearer ' . $tempdata->access_token,
            // ];
            // $response = $client->get($url, [
            //     'headers' => $headers,
            // ]);

            // $data = json_decode($response->getBody(), true);
            // $meetings = $data['meetings'];

            // Loop through the meetings

        $liveclasses = zoom_classes::select('*','zoom_classes.id as liveclass_id','batches.name as batch','subjects.name as subjects','topics.name as topics')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->join('subjects','subjects.id','topics.subject_id')
        ->where('zoom_classes.is_completed',0)
        ->where('zoom_classes.is_active',1)
        ->get();
        $classes = (new CommonController)->classes();
        return view('tutor.liveclasses', compact('liveclasses','classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return redirect('https://zoom.us/oauth/authorize?response_type=code&client_id=oFed_e_zQi6wE8183XRI0A&redirect_uri=http://127.0.0.1:8000/tutor/liveclass');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_old(Request $request)
    {
        $testurl = parse_url($request->url, PHP_URL_QUERY);
        $access_code = substr($testurl, 5);
    }



    function store(Request $request)
    {
        $testurl = parse_url($request->url, PHP_URL_QUERY);
        $access_code = substr($testurl, 5);

        $accountID = 'metacitinasar@gmail.com';
        $clientId = 'oFed_e_zQi6wE8183XRI0A';
        $clientSecret = '1hYXjFPAXUJ8uYOQDUGTJJNjzVGdaxTu';

        $url = 'https://zoom.us/oauth/token';

        $client = new Client();

        $headers = [
            'Host' => 'zoom.us',
            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
        ];

        $formData = [
            'grant_type' => 'authorization_code',
            'account_id' => $accountID,
            'code' => $access_code,
            'redirect_uri' => 'https://mychoicetutor.com/tutor/tutorslots',
        ];

        try {
            $response = $client->post($url, [
                'headers' => $headers,
                'form_params' => $formData,
            ]);

            $data = json_decode($response->getBody(), true);
            // Now you can access the Zoom access token from the response data.
            $accessToken = $data['access_token'];

            // You can return or process the access token as needed.
            echo $accessToken;
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // Handle any exceptions or errors here.
            // For example, you can log the error or throw a custom exception.
            // Note: Don't forget to handle the error cases appropriately in a production environment.
            // return null;
            echo 'Fail';
        }
    }

    public function getzoomuser()
    {
        $token = 'Bearer eyJzdiI6IjAwMDAwMSIsImFsZyI6IkhTNTEyIiwidiI6IjIuMCIsImtpZCI6IjU0MDgxMmUxLTNkMjItNGNkMC05NTFhLTMwMTlhMjBkNTI1MSJ9.eyJ2ZXIiOjksImF1aWQiOiI1YjEyZjc2YWM3MTA1MmVmZTgzMjExN2ZlMTQ5Zjk1ZiIsImNvZGUiOiJ0ZUR0OXpGZk0zNnlhSl9ETVpMUlotZUpQMDlNQzRObXciLCJpc3MiOiJ6bTpjaWQ6b0ZlZF9lX3pRaTZ3RTgxODNYUkkwQSIsImdubyI6MCwidHlwZSI6MCwidGlkIjowLCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJmZGR2cUNwZFNyZWEtRkM2d3V4YnBBIiwibmJmIjoxNjkwODAxMzAxLCJleHAiOjE2OTA4MDQ5MDEsImlhdCI6MTY5MDgwMTMwMSwiYWlkIjoiaTFaUGd1RnRUTC1Namo5VUtVRnZfUSJ9.5wBw1Vq1YJhp4nwuFRZEMFt2kL-14tvZheIPzc46CKVbbNjeBPfJo3xEmhPxjYHw8FyfPl_fMEEUuTAjkiTNPQ';

        $url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com';

        $client = new Client();

        $headers = [
            'Authorization' => $token,
        ];
        $response = $client->get($url, [
            'headers' => $headers,
        ]);

        $data = json_decode($response->getBody(), true);
        // echo $data;
        dd($data);
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function classlist()
    {
        $liveclasses = zoom_classes::select('*','zoom_classes.id as liveclass_id','batches.name as batch','subjects.name as subjects','topics.name as topics')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->join('subjects','subjects.id','topics.subject_id')
        ->where('zoom_classes.is_completed',0)
        ->where('zoom_classes.is_active',1)
        ->get();
        $classes = (new CommonController)->classes();
        return view('tutor.liveclasses', compact('liveclasses','classes'));
    }

    public function scheduleclass(Request $request){


        // Validation
        $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'batchid' => 'required',
            'topic' => 'required',
            'classstarttime' => 'required',
            'classduration' => 'required',
            'classpassword' => 'required'
        ]);

        // Getting Access Token from DB
        $access_data = access_token::select('*')->where('user_id',session('userid')->id)->first();

        // Creating meeting in Zoom using API


        $topicdata = topics::select('*')->where('id',$request->topic)->first();
        $batchdata = batches::select('*')->where('id',$request->batchid)->first();
      // API Endpoint for creating meetings
      $api_url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com/meetings';
    //   {{baseUrl}}/users/:userId/meetings

      // Request body for creating a meeting (customize as needed)
      $meeting_data = [
        'topic' => '('.$batchdata->name.') '.$topicdata->name,
        'type' => 2,
        'start_time' => $request->input('classstarttime'),
        'duration' => (int) $request->input('classduration'),
        'timezone' => Carbon::now()->timezone->getName(),
        'password' => $request->input('classpassword'),
        'agenda' => $topicdata->name,
        'settings' => [
            'host_video' => true,
            'participant_video' => true,
            'join_before_host' => false,
            'mute_upon_entry' => true,
            'watermark' => false,
            'approval_type' => 1,
            'registration_type' => 1,
            'audio' => 'both',
            'auto_recording' => true,
            'enforce_login' => false,
            'waiting_room' => false,
            'registrants_email_notification' => true,
        ],
        'registrants' => [
            [
                'email' => 'invitee1@example.com',
                'first_name' => 'Invitee 1',
                'last_name' => 'Last Name 1',
            ],
            [
                'email' => 'invitee2@example.com',
                'first_name' => 'Invitee 2',
                'last_name' => 'Last Name 2',
            ],
            // Add more invitees as needed
        ],
    ];


      // Send POST request to create the Zoom meeting
      $response = Http::withHeaders([
          'Authorization' => 'Bearer ' . $access_data->access_token,
          'Content-Type' => 'application/json',
      ])->post($api_url, $meeting_data);

    //   echo $response;
      // Check if the request was successful and return the response
      if ($response->successful()) {
          $response = json_decode($response);
          $data = new zoom_classes();

          $data->tutor_id = session('userid')->id;
          $data->batch_id = $request->batchid;
          $data->uuid = $response->uuid;
          $data->meeting_id = $response->id;
          $data->host_id = $response->host_id;
          $data->host_email = $response->host_email;
          $data->topic_id = $request->topic;
          $data->topic_name = $response->topic;
          $data->type = $response->type;
          $data->status = $response->status;
          $data->start_time = $response->start_time;
          $data->duration = $response->duration;
          $data->timezone = $response->timezone;
          $data->agenda = $response->agenda;
          $data->start_url = $response->start_url;
          $data->join_url = $response->join_url;
          $data->password = $response->password;
          $data->h323_password = $response->h323_password;
          $data->pstn_password = $response->pstn_password;
          $data->encrypted_password = $response->encrypted_password;

            $res = $data->save();
            if ($res) {
                return back()->with('success', 'Class scheduled successfully!');
            } else {
                return back()->with('fail', 'Something went wrong. Please try again later');
            }
      } else {
          return response()->json(['error' => 'Failed to create Zoom meeting'], 500);
      }
    }

    public function completed(Request $request,$id){

        $request->validate([
            'video_link' => 'required',
        ]);
        $data = zoom_classes::find($id);
        $data->is_completed = 1;
        $data->recording_link = $request->video_link;
        $data->status = 'Completed';
        $data->completed_at = Carbon::now();
        $res = $data->save();

        $slotupdate = SlotBooking::where('meeting_id', '=', $data->id)->first();

        if ($slotupdate) {
            $slotupdate->is_class_scheduled = 2;
            $slotupdate->update();
        }

        $response = [
            'message' => 'Class Marked as completed',
        ];
        return response()->json($response,200);
        // if ($res) {
        //     return back()->with('success', 'Status Updated Successfully!');
        // } else {
        //     return back()->with('fail', 'Something went wrong. Please try again later');
        // }
    }



    public function liveclassstatusupdate(Request $request){
        $data = zoom_classes::find($request->id);
    $data->status = 'Started';
    $data->started_at = Carbon::Now();
    $res = $data->save();
    return json_encode(array('statusCode' => 200));
    }

    public function liveclassjoinupdate(Request $request){

        $class = zoom_classes::find($request->id);
        $tpc = topics::find($class->topic_id);
        // $sub = subjects::find($tpc->subject_id);
        $slotbooking = SlotBooking::select('*')->where('meeting_id','=',$class->id)->first();
        $sub = subjects::find($slotbooking->subject_id);

        $chk = studentattendance::select('*')
        ->where('class_id',$sub->class_id)
        ->where('subject_id',$sub->id)
        ->where('batch_id',$class->batch_id)
        ->where('topic_id',$class->topic_id)
        ->where('tutor_id',$class->tutor_id)
        ->where('student_id',session('userid')->id)
        ->first();
        if($chk){
            $data = studentattendance::find($chk->id);
        }else{
            $data = new studentattendance();
        }
        $data->student_id = session('userid')->id;
        $data->class_id = $sub->class_id;
        $data->subject_id = $sub->id;
        $data->tutor_id = $class->tutor_id;
        $data->topic_id = $class->topic_id;
        $data->class_starts_at = $class->start_time;
        // $data->class_ends_at = ;
        $data->status = 1;
        $data->batch_id = $class->batch_id;
        $res = $data->save();
        return json_encode(array('statusCode' => 200));
    }

}
