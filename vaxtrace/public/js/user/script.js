$(function(){
   
        var regionOptions = "<option value='' seleted>Select Region</option>";
        var provinceOptions = "";
        var cityOptions = "";
        var barangayOption = "";
        
        $.getJSON(getAddressUrl,function(result){
            $.each(result, function(i,region) {
                
                Object.keys(region).forEach(key => { 
                    regionOptions+="<option value='"+key+"'>"+region[key].region_name+"</option>";
                })
            });
            $('.region').html(regionOptions);
        });

        $(".region").change(function(){
            provinceOptions = "<option value='' seleted></option>";
            $.getJSON(getAddressUrl,function(result){
                $.each(result, function(i,province) {
                    var region = $('.region').val();
                    Object.keys(province[region].province_list).forEach(key => {   
                        provinceOptions+="<option value='"+key+"'>"+key+"</option>";
                    })
                });
                $('.province').html(provinceOptions);
                provinceOptions = "";
            });
        });

        $(".province").change(function(){
            cityOptions = "<option value='' seleted></option>";
            $.getJSON(getAddressUrl,function(result){
                $.each(result, function(i,region) {
                    var region1 = $('.region').val();
                    var province = $('.province').val();
                    Object.keys(region[region1].province_list[province].municipality_list).forEach(key => {   
                        cityOptions+="<option value='"+key+"'>"+key+"</option>";
                    })
                });
                $('.city').html(cityOptions);
                cityOptions = "";
            });
        });

        
        $(".city").change(function(){
            barangayOption = "<option value='' seleted></option>";
            $.getJSON(getAddressUrl,function(result){
                $.each(result, function(i,region) {
                    var region1 = $('.region').val();
                    var province = $('.province').val();
                    var city = $('.city').val();
                    var location = region[region1].province_list[province].municipality_list[city].barangay_list;
                    Object.keys(location).forEach(key => {   
                        barangayOption+="<option value='"+location[key]+"'>"+location[key]+"</option>";
                    })
                });
                $('.barangay').html(barangayOption);
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


   

