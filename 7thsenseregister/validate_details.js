    function validate()
    {
        var first_name = document.details.first_name.value;
        var last_name = document.details.last_name.value;
        var dd = document.details.dd.value;
        var mm = document.details.mm.value;
        var yyyy = document.details.yyyy.value;
        var phone = document.details.phone.value;
        var degree = document.details.degree.value;
        var course = document.details.course.value;
        var year = document.details.year.value;
        var college = document.details.college.value;
        var college_id = document.details.college_id.value;
        var address = document.details.address.value;
        var city = document.details.city.value;
        var state = document.details.state.value;
        var pin_code = document.details.pin_code.value;
        var password = document.details.password.value;
        var re_password = document.details.re_password.value;
        
        var result = true;
        //password
        var RE_PASSWORD = /^(.){6,255}$/;
        if (!RE_PASSWORD.test(document.details.password.value))
        {
            document.getElementById("password_dom").innerHTML="</br>your password should be more than or equal to 6 characters";
            document.details.password.value='';
            document.details.password.focus();
            result = false;
        }
        else
        {
            document.getElementById("password_dom").innerHTML='<span class="form_info_dom"></br>&nbsp;&nbsp;should be atleast 6 characters long</span>';
        }
        //re_password
        if (document.details.password.value != document.details.re_password.value || document.details.password.value == '')
        {
            document.getElementById("re_password_dom").innerHTML="</br>passwords do not match / left empty";
            document.details.re_password.value='';
            document.details.re_password.focus();
            result = false;
        }
        else
        {
            document.getElementById("re_password_dom").innerHTML="";
        }
        //pin_code
        var RE_PHONE = /^\d{6}$/;
        if (!RE_PHONE.test(document.details.pin_code.value))
        {
            document.getElementById("pin_code_dom").innerHTML="</br>should be a 6 digit number";
            document.details.pin_code.value='';
            document.details.pin_code.focus();
            result = false;
        }
        else
        {
            document.getElementById("pin_code_dom").innerHTML="";
        }
        //state
        if (document.details.state.value == 'false')
        {
            document.getElementById("state_dom").innerHTML="</br>select state";
            document.details.state.focus();
            result = false;
        }
        else
        {
            document.getElementById("state_dom").innerHTML="";
        }
        //city
        var RE_CITY = /^[A-Za-z]{1}[A-Za-z\-\, ]{0,28}[A-Za-z\. ]{1}$/
        if (!RE_CITY.test(document.details.city.value))
        {
            document.getElementById("city_dom").innerHTML="</br>should start and end with alphabet and can have spaces and hyphens in between";
            document.details.city.value='';
            document.details.city.focus();
            result = false;
        }
        else
        {
            document.getElementById("city_dom").innerHTML="";
        }
        //address
        var addresslenght = document.details.address.value;
        if (addresslenght.length > 200 || addresslenght.length == 0)
        {
            document.getElementById("address_dom").innerHTML="</br>should be less than 200 and should not left blank";
            document.details.address.value='';
            document.details.address.focus();
            result = false;
        }
        else
        {
            document.getElementById("address_dom").innerHTML="";
        }
        //college
        var RE_NAMES = /^[A-Za-z0-9]{1}[A-Za-z0-9\.\-\, ]{0,38}[A-Za-z0-9\. ]{1}$/
        if (!RE_NAMES.test(document.details.college.value))
        {
            document.getElementById("college_dom").innerHTML="</br>should start and end with alphabet/numeral and alphabets, numerals, periods, hyphens, and spaces are allowed in between";
            document.details.college.value='';
            document.details.college.focus();
            result = false;
        }
        else
        {
            document.getElementById("college_dom").innerHTML="";
        }
        //course
        if (!RE_NAMES.test(document.details.course.value))
        {
            document.getElementById("course_dom").innerHTML="</br>should start and end with alphabet/numeral and alphabets, numerals, periods, hyphens, and spaces are allowed in between";
            document.details.course.value='';
            document.details.course.focus();
            result = false;
        }
        else
        {
            document.getElementById("course_dom").innerHTML="";
        }
        //year
        if (document.details.year.value == 'false')
        {
            document.getElementById("year_dom").innerHTML="</br>select year";
            document.details.year.focus();
            result = false;
        }
        else
        {
            document.getElementById("year_dom").innerHTML="";
        }
        //degree
        if (!RE_NAMES.test(document.details.degree.value))
        {
            document.getElementById("degree_dom").innerHTML="</br>degree should start and end with alphabet/numeral and alphabets, numerals, periods, hyphens, and spaces are allowed in between";
            document.details.degree.value='';
            document.details.degree.focus();
            result = false;
        }
        else
        {
            document.getElementById("degree_dom").innerHTML="";
        }
        //college_id
        var RE_COLLEGEID = /^[A-Za-z0-9_\.\- ]{1,20}$/        
        if (!RE_COLLEGEID.test(document.details.college_id.value))
        {
            document.getElementById("college_id_dom").innerHTML="</br>alphabets, numerals, periods, hyphens, spaces and underscore are allowed";
            document.details.college_id.value='';
            document.details.college_id.focus();
            result = false;
        }
        else
        {
            document.getElementById("college_id_dom").innerHTML="";
        }
        //phone
        var RE_PHONE = /^\d{10}$/;
        if (!RE_PHONE.test(document.details.phone.value))
        {
            document.getElementById("phone_dom").innerHTML="</br>should be a 10 digit valid phone number";
            document.details.phone.value='';
            document.details.phone.focus();
            result = false;
        }
        else
        {
            document.getElementById("phone_dom").innerHTML="";
        }
        //sex
        var sex = false;
        for (var i=0; i < document.details.sex.length; i++)
        {
            if (document.details.sex[i].checked)
            {
                sex = document.details.sex[i].value;
            }
        }
        if (sex == false)
        {
            document.getElementById("sex_dom").innerHTML="</br>select your gender";
            result = false;
        }
        else
        {
            document.getElementById("sex_dom").innerHTML="";
        }
        var datevalid = true;
        //yyyy
        if (!(parseInt(document.details.yyyy.value)>1900 & parseInt(document.details.yyyy.value)<2010))
        {
            document.getElementById("yyyy_dom").innerHTML="</br>year should be in 4 digit";
            document.details.yyyy.value='';
            document.details.yyyy.focus();
            result = false;
            datevalid = false;
        }
        else
        {
            document.getElementById("yyyy_dom").innerHTML="";
        }
        //mm
        if (document.details.mm.value == 'false')
        {
            document.getElementById("mm_dom").innerHTML="</br>select a month</br>";
            document.details.mm.focus();
            result = false;
            datevalid = false;
        }
        else
        {
            document.getElementById("mm_dom").innerHTML="";
        }
        //dd
        if (document.details.dd.value == 'false')
        {
            document.getElementById("dd_dom").innerHTML="</br>select a day</br>";
            document.details.dd.focus();
            result = false;
            datevalid = false;
        }
        else
        {
            document.getElementById("dd_dom").innerHTML="";
        }
        //date validity check
        if (datevalid==true)
            if (!(mm<=12 && dd<=31))
            {
            result = false;
            }
            if (mm==1||mm==3||mm==5||mm==7||mm==8||mm==10||mm==12)
            {
                if (dd>31)
                {
                    result = false;
                    document.getElementById("dd_dom").innerHTML="</br>selected month dont have days more than 31 days</br>";
                }
            }
            else
            {
                if (mm == 2)
                {
                    if((yyyy%4)==0)
                    {
                        if(dd>29)
                        {
                            result = false;
                            document.getElementById("dd_dom").innerHTML="</br>selected month dont have days more than 29 days</br>";
                        }
                    }
                    else
                    {
                        if(dd>28)
                        {
                            result = false;
                            document.getElementById("dd_dom").innerHTML="</br>selected month dont have days more than 28 days</br>";
                        }
                    }
                }
                else
                {
                    if(dd>30)
                    {
                        result = false;
                        document.getElementById("dd_dom").innerHTML="</br>selected month dont have days more than 30 days</br>";
                    }
                }
            }
        //last_name
        var RE_USERNAME = /^[A-Za-z\. ]{1,40}$/
        if (!RE_USERNAME.test(document.details.last_name.value))
        {
            document.getElementById("last_name_dom").innerHTML="</br>one or more alphabetic character(s) are allowed";
            document.details.last_name.value='';
            document.details.last_name.focus();
            result = false;            
        }
        else
        {
            document.getElementById("last_name_dom").innerHTML="";
        }
        //first_name
        if (!RE_USERNAME.test(document.details.first_name.value))
        {
            document.getElementById("first_name_dom").innerHTML="</br>one or more alphabetic character(s) are allowed";
            document.details.first_name.value='';
            document.details.first_name.focus();
            result = false;
        }
        else
        {
            document.getElementById("first_name_dom").innerHTML="";
        }
        
        return result;

    }
