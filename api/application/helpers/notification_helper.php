<?php defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('sent_notify')) :
    function sent_notify($message, $uid, $user_type = "") {
        $ci = & get_instance();
        $ci->db->select('tblDevices.device_id,
						 tblDevices.device_type
					    ');
        $ci->db->from('tblDevices');
        $ci->db->where('tblDevices.uid', $uid);
        $query = $ci->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();

            if ($row->device_type == "android") {
                push_andriod($row->device_id, $message, $user_type);
            } else if ($row->device_type == "ios") {
                push_ios($row->device_id, $message, $user_type);
            }
            return true;
        } else {
            return false;
        }
    }

// sent_notify
endif;

if (!function_exists('push_ios')) :

    function push_ios($device_id, $message, $user_type = "") {
        // Push notification to android		
        $deviceToken = $device_id; //'5654bfe5bcc825fb5eb487d2d56ff02f72503b9d477ffb5755b6fdbbe542a313';
        $passphrase = 'devdesks321';  // Put your private key's passphrase here
        // $message = 'Message send to IOS User'; // // Put your alert message here

        $pem_file = APPPATH . '/libraries/ck.pem';
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $pem_file);
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx
        );

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

//        echo 'Connected to APNS' . PHP_EOL;
        // Create the payload body
        $body['aps'] = array('alert' => "New invoice",
//            'badge' => $badge,
            'detail' => $message,
            'sound' => 'default'
        );

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        /* if (!$result)
          echo 'Message not delivered' . PHP_EOL;
          else
          echo 'Message successfully delivered' . PHP_EOL;
         */

        // Close the connection to the server
        fclose($fp);
    }

// push_ios
endif;

if (!function_exists('push_andriod')) :

    function push_andriod($device_id, $message, $user_type = "") {
        // Push notification to android
        $reg_id = $device_id;

        //$reg_id = 'APA91bEA7vJ1TPR1eROiQMAPOGjBxNg15fvOJxsOQ5A8WRckMMSBa_cxVrXelU6j_lJPDFHbWEUX8UOhqM1hGz6Nano27zrgDeDvul6omKIVQIvTxkxbH5zLzn4Qw4lJe8Ja4XYG7_mh';
        if ($user_type != "" && $user_type == "merchant") {
            define("GOOGLE_API_KEY", "AIzaSyBU1Y6jI743sH-VYw88rkYG7dwIdqfD5YQ");  // Server key for Imali Merchants
        } else {
            define("GOOGLE_API_KEY", "AIzaSyDJQQCthaYSpc382IvfN2206KecZiRvrdA"); // Server Key for Imali Users
        }
        $fields = array('registration_ids' => array($reg_id),
           				'data'             => $message);

        $headers = array('Authorization: key='.GOOGLE_API_KEY, 'Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if ($result === FALSE) {
            //die('Problem occurred: ' . curl_error($ch));
            echo json_encode(array('error' => true, 'message' => "Push notification sending failed."));
        }
        curl_close($ch);
		// echo $result;
    } // push_andriod







 // push_andriod
endif;