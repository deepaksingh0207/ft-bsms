<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

class SmsComponent extends Component
{
    

    public function sendOTP($to, $message) {
        
        $url = 'https://www.fast2sms.com/dev/bulkV2?authorization=TUJOiyzGtxRpCSM5wu4QvFgs2onN19mAecDPZ37Y6XHWkjlE8K3VEDCRNMLb02gX1pYFqn5mo9vIke6J&route=q&message='.rawurlencode($message).'&language=english&flash=0&numbers='.$to;
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // Process your response here
        return $response;
    }
    public function sendSMS($to, $message) {
        $apiKey = urlencode(Configure::read('SMSAPI.KEY'));
        // Message details
        $numbers = implode(',', $to);
        $sender = urlencode(Configure::read('SMSAPI.SENDOR'));
        
        print_r($numbers);
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => rawurlencode($message));
        // Send the POST request with cURL
        $ch = curl_init(Configure::read('SMSAPI.URL'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close($ch);
        // Process your response here
        return $response;
    }
    
}

?>