// jQuery AB Testing
// Copyright 2012
// Version 1.0
//
// Author: Justin Funk < funkju@gmail.com>
// Website: www.instabir.com
(function($){
 $.fn.extend({
        //pass the options variable to the function
        ab: function(options) {
            var defaults = {
                URL: "http://localhost/server.php",
                els: this,
                idx:  Math.round(Math.random()*(this.length-1)),
                testname: 'default',
                action_el: null,
                action_ev: 'click'
            }

            options =  $.extend(defaults, options);

            if($(options.action_el).length == 0) return -1;
            for(var i=0; i <options.els.length; i++){
                if($(options.els[i]).attr('id') == "") return -2;
            }

            setPK = function() { return function(data){ options.pk = data.pk; } }();
            //var gpks = document.createElement( 'script' );
            //gpks.type = 'text/javascript';
            //gpks.src = options.URL+'?a=gpk&d='+window.location.host+'&t='+options.testname+'&o='+options.els[options.idx].id+'&w.id='+$(options.els[options.idx]).attr("id")+'&w.src='+$(options.els[options.idx]).attr("src")+'&w.html='+$(options.els[options.idx]).html()+'&w.tag='+options.els[options.idx].nodeName+'&rand='+Math.random();
            //$("head").append( gpks );
						/*
            var pageTracker = _gaq._getTracker("UA-4980002-2");
            pageTracker._setCustomVar(1, options.testname, $(options.els[options.idx]).attr("id"), 1);
            pageTracker._trackPageview();
						*/
						_gaq.push(['_trackPageView', 'AB', options.testname, $(options.els[options.idx]).attr("id") ]);


            $(options.els).filter(function(index){return index != options.idx;}).remove();
            $(options.els[options.idx]).show();

            $(options.action_el).bind(options.action_ev+'.ab', function(){
                    var cs = document.createElement('script');
                    cs.type = 'text/javascript';
                    cs.src = options.URL+"?a=c&d="+window.location.host+"&t="+options.testname+"&pk="+options.pk;
                    $("head").append(cs);
                    $(this).unbind(options.action_ev+'.ab');

                    action_el = this;
                    if($(this).is("a")){
                        rerun  = function(){ return function(){$(action_el).trigger(options.action_ev); window.location=$(action_el).attr('href');}}();
                    } else {
                        rerun  = function(){ return function(){$(action_el).trigger(options.action_ev); }}();
                    }
                    return false;
            });

            $(options.action_el).data('events')[options.action_ev].reverse();
            return this[options.idx];;
        }
    });
})(jQuery);
