<?php
namespace Udiptaweb\LaravelMultilang\Traits;

use Udiptaweb\LaravelMultilang\Models\Translation;
use GoogleTranslate;
trait hasTranslation{
    public function translations()
    {
        return $this->morphMany(Translation::class,'translationable');
    }
    public function createTranslation()
    {
        $translable_cols = $this->translable_cols;
        $languages = config('laravel-multilang.languages');
        $default_language = config('laravel-multilang.default_language');
        foreach($languages as $language){
            if($language != $default_language){
                foreach($translable_cols as $col_name){
                    $data = $this->{$col_name};
                    $translated_data = $this->translateTo($language,$data);
                    Translation::firstOrCreate([
                        'content' => $translated_data,
                        'lang_code' => $language,
                        'col_name' => $col_name,
                        'translationable_id' => $this->id,
                        'table' => $this->getTable(),
                        'translationable_type' => get_class($this)
                    ]);
                }
            }
        }
    }
    public function updateTranslation()
    {
        $translable_cols = $this->translable_cols;
        $languages = config('laravel-multilang.languages');
        $default_language = config('laravel-multilang.default_language');
        foreach($languages as $language){
            if($language != $default_language){
                foreach($translable_cols as $col_name){
                    $data = $this->{$col_name};
                    $translated_data = $this->translateTo($language,$data);
                    $translation = $this->translations()->where('col_name',$col_name)->where('lang_code',$language)->first();
                    if($translation){
                        $translation->update([
                            'content' => $translated_data
                        ]);
                    }
                }
            }
        }
    }
    public function deleteTranslation()
    {
        $translable_cols = $this->translable_cols;
        $languages = config('laravel-multilang.languages');
        $default_language = config('laravel-multilang.default_language');
        foreach($languages as $language){
            if($language != $default_language){
                foreach($translable_cols as $col_name){
                    $data = $this->{$col_name};
                    $translated_data = $this->translateTo($language,$data);
                    $translation = $this->translations()->where('col_name',$col_name)->where('lang_code',$language)->first();
                    if($translation){
                        $translation->delete();
                    }
                }
            }
        }
    }
    public function getTranslated($col_name,$language)
    {
        $translation = $this->translations()->where('col_name',$col_name)->where('lang_code',$language)->first();
        if($translation){
            return $translation->content;
        }
        return '';

    }

    public function translateTo($language,$data)
    {
        $translated_data = GoogleTranslate::translate($data,$language);
        return $translated_data['translated_text'];
    }
}

?>