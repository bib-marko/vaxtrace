$(function(){
   
        var regionOptions = "<option value='' seleted></option>";
        var provinceOptions = "";
        var cityOptions = "";
        var barangayOption = "";
        
        $.getJSON(getAddressUrl,function(result){
            $.each(result, function(i,region) {
                
                Object.keys(region).forEach(key => { 
                    regionOptions+="<option value='"+key+"'>"+region[key].region_name+"</option>";
                })
            });
            $('.region1').html(regionOptions);
        });

        $(".region1").change(function(){
            provinceOptions = "<option value='' seleted></option>";
            $.getJSON(getAddressUrl,function(result){
                $.each(result, function(i,province) {
                    var region = $('.region1').val();
                    Object.keys(province[region].province_list).forEach(key => {   
                        provinceOptions+="<option value='"+key+"'>"+key+"</option>";
                    })
                });
                $('.province1').html(provinceOptions);
                provinceOptions = "";
            });
        });

        $(".province1").change(function(){
            cityOptions = "<option value='' seleted></option>";
            $.getJSON(getAddressUrl,function(result){
                $.each(result, function(i,region) {
                    var region1 = $('.region1').val();
                    var province = $('.province1').val();
                    Object.keys(region[region1].province_list[province].municipality_list).forEach(key => {   
                        cityOptions+="<option value='"+key+"'>"+key+"</option>";
                    })
                });
                $('.city1').html(cityOptions);
                cityOptions = "";
            });
        });

        
        $(".city1").change(function(){
            barangayOption = "<option value='' seleted></option>";
            $.getJSON(getAddressUrl,function(result){
                $.each(result, function(i,region) {
                    var region1 = $('.region1').val();
                    var province = $('.province1').val();
                    var city = $('.city1').val();
                    var location = region[region1].province_list[province].municipality_list[city].barangay_list;
                    Object.keys(location).forEach(key => {   
                        barangayOption+="<option value='"+location[key]+"'>"+location[key]+"</option>";
                    })
                });
                $('.barangay1').html(barangayOption);
                barangayOption = "";
            });
        });
});
    

    function formatDate(date, opt) {
        if (date) {
            if (opt == "full") {
                const formatted_date = new Date(date);
                return formatted_date.toLocaleDateString();
            }
            if (opt == "date_time") {
                const formatted_date = new Date(date);
                return formatted_date.toLocaleDateString();
            }
        } else {
            return ``;
        }
    }

  //CONCATINANTE FULLNAME
  function generateFullname(data){
    var fullname ="";
        if(data.person.middle_name != null && data.person.suffix != null ){
            fullname = data.person.first_name + ' ' + data.person.middle_name + ' ' + data.person.last_name + ' ' + data.person.suffix;
        }
        else if(data.person.middle_name == null && data.person.suffix != null ){
            fullname = data.person.first_name + ' ' + data.person.last_name + ' ' + data.person.suffix;
        }
        else if(data.person.middle_name != null && data.person.suffix == null ){
            fullname = data.person.first_name + ' ' + data.person.middle_name + ' ' + data.person.last_name;
        }
        else{
            fullname = data.person.first_name + ' ' + data.person.last_name;
        }
        return fullname;
  }

  // STATUS OF ACOUNT
  function isApproved(data) {
      if(data == null){
        return `<span class="btn btn-alt-success min-width-125 rounded-pill p-0">ACTIVATED</span>`;
      }else {
        return `<span class="btn btn-alt-danger min-width-125 rounded-pill p-0">DEACTIVATED</span>`;
      }
      
  }


   

