const optionsAxios = {
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    }
}

axios.interceptors.request.use(
    function (config) {
      $("#preloaderBtn").html('<div class="loader">Loading...</div>');
      return config;
    },
    function (error) {
      return Promise.reject(error);
    }
  );
  
  axios.interceptors.response.use(
    function (response) {
     // $("body, html").animate({ scrollTop: 0 }, 600);
     var div = $("#preloaderBtn");
     div.html(div.attr("data-back"));
     return response;
    },
    function (error) {
      // Do something with response error
      console.log("Error fetching the data");
      return Promise.reject(error);
    }
  );


axios.defaults.headers.common = {
    "X-Requested-With": "XMLHttpRequest",
  };
$(document).ready(function()
{
    

});

$(window).on('load', function()
{
    $('.preloader').fadeOut('slow');
})


var alert = {
    add: function(msg)
    {
        
    }
}