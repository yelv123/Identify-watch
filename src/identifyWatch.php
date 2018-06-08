<?php
namespace identifyWatch;
use GuzzleHttp\Client;
class identifyWatch
{
    const BASE_URL = "https://quick-auction.luxurymore.cn/";
    const ACCESS_TOKEN_URL = "index.php?s=/api/Search/getAccessToken";
    const SEARCH_URL = "index.php?s=/api/Search/searchWatchByImage";
    public $appId, $appKey, $secretKey;
    public $httpClient;
    public $error = '';
    public $errorNo = '';

    public function __construct($appId, $appKey, $secretKey)
    {
        $this->appId      = $appId;
        $this->appKey     = $appKey;
        $this->secretKey  = $secretKey;
        $this->httpClient = new Client([
            'base_uri' => self::BASE_URL,

            'timeout' => 10]);
    }

    public function setAuth()
    {
        $accessToken = empty($_SESSION['WATCH_AUTH']) ? [] : $_SESSION['WATCH_AUTH'];
        if (empty($accessToken) || $accessToken['expiration_time'] - 1000 > time()) {
            $accessToken            = $this->getAccessToken();
            $_SESSION['WATCH_AUTH'] = $accessToken;
        } else {
            $accessToken = $_SESSION['WATCH_AUTH'];
        }
        $this->httpClient = new Client([
            'base_uri' => self::BASE_URL,
            'timeout'  => 10,
            'headers'  => [
                'appid' => $this->appId,
                'token' => $accessToken['access_token'],
            ]
        ]);
        return true;

    }

    public function getAccessToken()
    {
        try {
            $timestamp         = time();
            $signature         = $this->makeSign($timestamp);
            $data['timestamp'] = $timestamp;
            $data['signature'] = $signature;
            $data['appid']     = $this->appId;
            $response          = $this->httpClient->request('POST', self::ACCESS_TOKEN_URL, ['json' => $data]);
            $data              = $response->getBody()->getContents();
            $data              = json_decode($data, true);
            if ($data['code'] == "200") {
                return $data['data'];
            } else {
                $this->error   = $data['error'];
                $this->errorNo = $data['errorNo'];
                return false;
            }
        } catch (\Exception $e) {
            $this->error   = '请求异常';
            $this->errorNo = 'abnormal request';
            return false;
        }
    }


    public function searchWatch($streamFile=null, $image_url,$nums = 10)
    {

        try {


            $this->setAuth();
            if($streamFile==null&&empty($image_url))
            {
                $this->error   = '未给图片';
                $this->errorNo = 'Not to picture';
                return false;
            }
            if($streamFile){
                $response = $this->httpClient->request('post', self::SEARCH_URL, ['multipart' => [
                    [
                        'name'     => 'result_nums',
                        'contents' => $nums
                    ],
                    [
                        'name'     => 'image',
                        'contents' => $streamFile,
                        'filename' => 'image.png'
                    ]
                ]]);
            }
            else{
                $response = $this->httpClient->request('post', self::SEARCH_URL, ['multipart' => [
                    [
                        'name'     => 'result_nums',
                        'contents' => $nums
                    ],
                    [
                        'name'     => 'image_url',
                        'contents' => $image_url
                    ]
                ]]);
            }

            $data     = $response->getBody()->getContents();
            $data     = json_decode($data, true);
            if ($data['code'] == "200") {
                return $data['data'];
            } else {
                $this->error   = $data['error'];
                $this->errorNo = $data['errorNo'];
                return false;
            }
        } catch (\Exception $e) {
            $this->error   = '请求异常';
            $this->errorNo = 'abnormal request';
            return false;
        }

    }

    private function makeSign($timestamp)
    {
        return md5(base64_encode($timestamp . $this->appId . $this->appKey . $this->secretKey));
    }
}