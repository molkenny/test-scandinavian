<?php

namespace App\Services;

class FetchBackEndInfo
{

    public static function getTranslationGroups()
    {
        try {

            $credentials = base64_encode(env('BE_AUTH_USER', 'user') .':' . env('BE_AUTH_PASS', 'password') ) ;
            $token = env('BE_AUTH_TOKEN', 'token');

            $httpClient = new \GuzzleHttp\Client(['base_uri' => 'https://practical-neumann.62-151-178-253.plesk.page','headers' => [
                'Authorization' => "Basic {$credentials},Bearer {$token}"
            ]]);

            $request = $httpClient->request(
                'GET',
                'api/translationgroups'
            );

            $content = $request->getBody()->getContents();
            $content = json_decode($content);

            return $content->data;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getTranslationByGroupAndLocale($group = null, $locale = null)
    {
        try {

            $credentials = base64_encode(env('BE_AUTH_USER', 'user') .':' . env('BE_AUTH_PASS', 'password') ) ;
            $token = env('BE_AUTH_TOKEN', 'token');

            $httpClient = new \GuzzleHttp\Client(['base_uri' => 'https://practical-neumann.62-151-178-253.plesk.page','headers' => [
                'Authorization' => "Basic {$credentials},Bearer {$token}"
            ]]);

            $queryStr = '';
            if($group) $queryStr = '?group='.$group;

            $request = $httpClient->request(
                'GET',
                'api/translations'.$queryStr
            );

            $content = $request->getBody()->getContents();
            $content = json_decode($content);

            return $content->data;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
