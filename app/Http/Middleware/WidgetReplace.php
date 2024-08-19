<?php

namespace App\Http\Middleware;

use Closure;

class WidgetReplace
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
        $response = $next($request);

        if(!method_exists($response, 'content')):
            return $response;
        endif;
//        $content = str_replace('[email-subcrible]', view('site.components.email-subcrible')->render(), $response->content());
//        $content = str_replace('[contact]', view('site.components.contact')->render(), $content);
        $content=$response->content();
        $response->setContent($content);
        // $response->setContent($content);

        $widgets = cache()->remember('widgets',config()->get('cms.cache_time'),function(){
            return \App\Widget::all();
        });
        // $widgets = cache()->remember('widgets',config()->get('cms.cache_time'),function(){
        //     return Widgets::all();
        // });

        foreach ($widgets as $key => $value) {
            $content = str_replace($value->alias, $value->content. $value->style . $value->script, $content);

            foreach ($widgets as $value2) {
                $content = str_replace($value2->alias, $value2->content . $value2->style . $value2->script, $content);
                foreach ($widgets as $value3) {
                    $content = str_replace($value3->alias, $value3->content.$value3->style . $value3->script, $content);
                }
            }
            $response->setContent($content);
        }

        return $response;
    }
}
