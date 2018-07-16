<?php
/**
 * Created by PhpStorm.
 * User: ирина
 * Date: 13.07.2018
 * Time: 0:03
 */

namespace app\models;
use Yii;
use yii\base\Model;
use GuzzleHttp\Client; // подключаем Guzzle
use yii\helpers\Url;

class ParseModel extends Model
{

    public $text;
    public $pages;
    public function parse($url, $start, $end){

        $client = new Client();
             if($start<$end){
                 $res = $client->request('GET', $url);
                 // получаем данные между открывающим и закрывающим тегами body
                 $body = $res->getBody();
                 \phpQuery::unloadDocuments();
                 $document = \phpQuery::newDocumentHTML($body);
                 $news = $document->find(".bd-item");
                 $next = $document->find('.uni-paging .active')->next()->attr('href');
                foreach (pq($news)  as $value){
                     $val = pq($value);

                    $text[0] = $val->find('.title')->text();
                    $text[1] = $val->find('.price-byr')->text();
                    $text[2] = $val->find('.bd-item-right-center')->html();
                    $text[3] = $val->find('.mb0')->html();
                    $text[4] = preg_replace('~\D+~','', $text[1]) ;
                    $parse = new Parse();
                    $parse->title = $text[0];
                    $parse->content = $text[2];
                    $parse->price = $text[1];
                    $parse->phone = $text[3];
                    $parse->summ = $text[4];
                    $parse->save();
                    $result1[] = $text;

                   /* $qwe[] = $result1[0].$result1[1];*/
                 }
                 if(!empty($next)){
                     $start++;
                     $after[] = ParseModel::parse($next, $start, $end);
                    /* debug($after);*/
                     $result[] = array_merge($result1, $after) /* $text[] = $after[0]*/;

                 }

             }


        return 'worked';
    }
}