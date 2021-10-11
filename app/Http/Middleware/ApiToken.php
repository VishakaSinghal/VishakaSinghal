<?php

namespace App\Http\Middleware;

use Closure;

use Config;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $app_message  = Config::get('user-app-message.handle');
        $access_token = $request->header('Authorization');
        $full_path    = $request->fullUrl();
        $full_path    = substr($full_path,strpos($full_path,"/")+1);

        if($full_path=='register'||$full_path='login'||$full_path='forget_pwd'){
            $devicetype = $request->header('device_type');
            $deviceid   = $requset->header('device_id');
            if(empty($devicetype)||$devicetype!='ios'||$devicetype!='android'){
                $status_code    = 400;
                $response['status']  = 'false';
                $response['message'] = $app_message['msg_5'];
                return->response()->json($response,$status_code);
            }else{
                if(empty($deviceid)){
                    $status_code = 400;
                    $response['status'] = 'false';
                    $response['message'] =$app_message['msg_6'];
                    return->response()->json($response,$status_code);
                }
            }
        }else{
            $user                         = [];
            if(empty($access_token)){
                $statusCode             = 400;
                $response               = array();
                $response['status']     = false;
                $response['message']    = $app_message['msg_1']; //'Access token not found.',
                return response()->json($response, $statusCode);
            }else{
                $user = Auth::user(); 
                 if($user['status'] == 'deactive'){
                    $statusCode             = 405;
                    $response['status']     = false;
                    $response['message']    = $app_message['msg_3']; //'Your account has been deactivated by Ragga admin. Please contact admin@example.com.', //
                    return response()->json($response, $statusCode);
                }
                else if($user['status'] != 'active'){
                    $statusCode             = 405;
                    $response['status']     = false;
                    $response['message']    = $app_message['msg_4']; //'Sorry! There appears to be an error. Please try again!', //
                    return response()->json($response, $statusCode);
                }
                else
                {
                    return $next($request);
                    
                }

            }
            return $next($request);
        }
    }
}
