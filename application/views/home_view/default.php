<div data-role="content"> 
    <input type="radio" name="radio-choice" onclick="activateSelect('disable')" onChange="savedata()" id="radio-choice-1" value="landelijk" checked="checked" />
    <label for="radio-choice-1">Landelijke berichten</label>

    <input type="radio" name="radio-choice" onclick="activateSelect('enable')" onChange="savedata()" id="radio-choice-2" value="regionaal" />
    <label for="radio-choice-2">Specifieke regio</label>            

    <div data-role="fieldcontain">
        <select disabled="false" name="select-choice-a" id="select-choice-a" onChange="savedata()" data-native-menu="false">
            <option>Kies een provincie</option>
            <option value="drenthe">Drenthe</option>
            <option value="flevoland">Flevoland</option>
            <option value="fryslan">Friesland</option>
            <option value="gelderland">Gelderland</option>
            <option value="groningen">Groningen</option>
            <option value="limburg">Limburg</option>
            <option value="noord-brabant">Noord-Brabant</option>
            <option value="noord-holland">Noord-Holland</option>
            <option value="overijssel">overijssel</option>
            <option value="utrecht">Utrecht</option>
            <option value="zeeland">Zeeland</option>
            <option value="zuid-holland">Zuid-Holland</option>
        </select>
    </div>

    <center><img onload="savedata()" src="images/politie_logo1.jpg" alt="Politie_logo" width="200"></center>
</div>

<script>
    // enable or disable the selectbox
    function activateSelect(val) {
        $("#select-choice-a").selectmenu(val);
    }
    
    function savedata() {
        // get value selected radiobtn
        var ch;
        var radios = document.getElementsByName('radio-choice');
        for(var i = 0, length = radios.length; i < length; i++) {
            if(radios[i].checked) {
                ch = radios[i].value;
            }
        }  
               
        // get value from select option
        var e = document.getElementById('select-choice-a');
        var prov = e.options[e.selectedIndex].value;
        if (prov == 'Kies een provincie') {
            prov = 'none';
        }
  
        //ajax call 
        $.ajax({
            type: 'POST',
            url: '/index.php/options/',
            data: { province : prov, choice : ch},
            success:function(){
                // successful request
            },
            error:function(){
                // failed request
            }
        }); 
    }
</script>