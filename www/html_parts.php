<?php

function html_pageHeader(){
    echo"<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Infrastruktur Team E</title>
        <link rel='icon' type='image/x-icon' href='./images/logo.png'>
        <link rel='stylesheet' type='text/css' href='./styles.css' />
        <script type='text/javascript' src='javaScript.js'> </script>
    </head>
    <body>
    <header class='header'>
        <div class='header-brand-wrapper'>
            <a class='header-brand' href='index.php'> <img src='./images/logo.png' alt='logo' id='logo'> </a>
        </div>
        <nav class='header-navbar'>
            <ul class='header-navbar-links'>
                <!--<li><a href='index.php'>STARTSEITE</a></li>
                <li><a>ÜBER UNS</a></li>
                <li><a>LEISTUNGEN</a></li>
                <li><a>PREISE</a></li>
                <li><a>REFERENZEN</a></li>
                <li><a>IMPRESSUM</a></li>
                <li><a href='mitarbeiterLogin.php'>login</a></li>-->
            </ul>
        </nav>
</header>";
}
function html_intern_pageHeader(){
    echo"<!DOCTYPE html>
<html class='intern'>
    <head>
        <meta charset='utf-8'>
        <title>Infrastruktur Team E</title>
        <link rel='icon' type='image/x-icon' href='./images/logo.png'>
        <link rel='stylesheet' type='text/css' href='./styles.css' />
        <script type='text/javascript' src='javaScript.js'> </script>
    </head>
    <body>
    <header class='header'>
        <div class='header-brand-wrapper'>
            <a class='header-brand' href='chat.php'> <img src='./images/logo.png' alt='logo' id='logo'> </a>
        </div>
        <nav class='header-navbar'>
            <ul class='header-navbar-links'>
                <!--<li><a href='dashboard.php'>DASHBOARD</a></li>
                <a href='kundenDatenbank.php'><li>KUNDEN</li></a>
                <a href='sprachmittlerDatenbank.php'><li>MITTLER</li></a>
                <a href='./testprototyp/osm.html'><li>KARTE</li></a>-->
                <a href='index.php'><li>logout</li></a>
            </ul>
        </nav>
</header>";
}

function html_footer(){
    include("db_connection.php");
    $conn = return_db_connection();
    echo"<footer class='footer'>
    <script type=\"text/javascript\" src=\"dialoge.js\"></script>
            <div class='container'>
                <p style='text-align:center;color:white;font-size:10px'>Made by: Team E</p>
            </div>
        </footer>    
    </body>
</html>";
}
function anfrageformular_Ue(){
    echo"
    <nav>
    <h2> Anfrage für Dokumentübersetzung: </h2> <br>
    <form method='post' action='./ue_anfrageVerarbeiten.php'>

        <!--Stammdaten-->
        <p style='font-weight:bold'>Persönliche Angaben:</p>
        <label> Nachname </label>
        <input id='nn_id' type='text' name='name' placeholder='Nachname' value='' required> <br>
        <label> Vorname </label>
        <input id='vn_id' type='text' name='vorname' placeholder='Vorname' value='' required> <br>
        <label> Geburtsdatum </label>
        <input id='gb_id' type='date' name='gbdatum' placeholder='Geburtsdatum' value='' required> <br>
        
        <label for='ge_id'>Geschlecht</label>
        <select name='geschlecht' id='ge_id' defaultValue=''>
            <option value='m'>männlich</option>
            <option value='w'>weiblich</option>
            <option value='d'>divers</option>
        </select><br>

        <label>Person</label>
        <select name='privatGesch' id='person_art_id' defaultValue=''>
            <option value='privat'>Privat</option>
            <option value='geschäftlich'>Geschäftlich</option>
        </select><br>
        
        <label> Straße </label> 
        <input id='st_id' type='text' name='strasse' placeholder='Straße' value='' required>
        <label> Nr. </label> 
        <input id='hausnr_id' type='text' name='hausnummer' placeholder='Hausnr.' value='' required> <br>
        <label> PLZ </label> 
        <input id='plz_id' type='text' name='postleitzahl' placeholder='PLZ' value='' required>
        <label> Ort </label> 
        <input id='ort_id' type='text' name='ort' placeholder='Ort' value='' required> <br>
        <label> E-Mail </label>
        <input id='email_id' value=''  type='text' placeholder='E-Mail' name='email' required> <br>

         <!--Auftragsdaten exklusiv für Überstzung-->
        <p style='font-weight:bold'>Angaben zum Auftrag:</p>
        <label> Art des Dokuments </label>
        <input id='dock_art_id' value=''  type='text' placeholder='Titel Ihres Dokuments' name='docTyp'> <br>
        <label> Dokument </label>
        <input id='doku_id' type='file' placeholder='Dokument' value='' name='dokument' > <br>
        <label> von Sprache </label>
        <input id='von_sprache_id' type='text' placeholder='Sprache Ihres Dokuments'value='' name='vonSprache'  required > <br>
        <label> zu Sprache </label>
        <input id='zu_sprache_id' type='text' placeholder='Übersetzen in' value='' name='zuSprache' required> <br>
        
        <!--Kommentar-->
        <label>Notieren Sie bitte hier die für die gewählte Zielsprache korrekte Schreibweise<br> aller in Ihrem Dokument vorkommenden Namen:</label> <br>
        <textarea name='kommentar' rows='5'></textarea> <br>

        <input type='Checkbox' name='abholung'>
        <label>Ich möchte die die Übersetzung in Papierform in der Geschäftsstelle abholen</labell><br>
        <input type='checkbox' name='agb' required>
        <label>Hiermit erkläre ich mich mit den Allgemeinen Geschäftsbedingungen der ITC-Bremerhaven einverstanden</label><br>
    
        
        <button type='submit'>Abschicken</button> 
    </form>
</nav>
    ";
    //Ich denke das hier brauchen wir nicht mehr
    //onclick='anfrage_antwort(this)'
}
function anfrageformular_Dol(){
    echo"
    <nav>
    <h2> Dolmetscher anfragen: </h2> <br>
    <form method='post' action='./do_anfrageVerarbeiten.php'>

        <!--Stammdaten-->
        <p style='font-weight:bold'>Persönliche Angaben:</p>
        <label> Nachname </label>
        <input id='nn_id' type='text' name='name' placeholder='Nachname' value='' required> <br>
        <label> Vorname </label>
        <input id='vn_id' type='text' name='vorname' placeholder='Vorname' value='' required> <br>
        <label> Geburtsdatum </label>      
        <input id='gb_id' type='date' name='gbdatum' placeholder='Geburtsdatum' value='' required> <br>
        
        <label for='ge_id'>Geschlecht</label>
        <select name='geschlecht' id='ge_id' defaultValue=''>
            <option value='m'>männlich</option>
            <option value='w'>weiblich</option>
            <option value='d'>divers</option>
        </select><br>

        <label for='person_art_id'>Person</label>
        <select name='privatGesch' id='person_art_id' defaultValue=''>
            <option value='1'>Privat</option>
            <option value='2'>Geschäftlich</option>
        </select><br>
        
        <label> Straße </label> 
        <input id='st_id' type='text' name='strasse' placeholder='Straße' value='' required>
        <label> Nr. </label> 
        <input id='hausnr_id' type='text' name='hausnummer' placeholder='Hausnr' value='' required> <br>
        <label> PLZ </label> 
        <input id='plz_id' type='text' name='postleitzahl' placeholder='PLZ' value='' required>
        <label> Ort </label> 
        <input id='ort_id' type='text' name='ort' placeholder='Ort' value='' required> <br>
        <label> E-Mail </label>
        <input id='email_id' value=''  type='text' placeholder='E-Mail' name='email' required> <br>

        <p style='font-weight:bold'>Angaben zum Auftrag:</p>
        <label> von Sprache </label>
        <input name='vonSprache' id='von_sprache_id' type='text' placeholder='Sprache 1'value=''  required > <br>
        <label> zu Sprache </label>
        <input name='zuSprache' id='zu_sprache_id' type='text' placeholder='Sprache 2' value=''  required> <br>
        
        <!--Auftragsdaten exklusiv für Dolmetscher-->
        <label> Treffpunkt </label>
        <input name='treffpunkt' type='text' placeholder='Treffpunkt' value=''  required> <br>
        <label> Zeitpunkt </label>
        <input name='treff_datum_start' type='date' placeholder='Datum' value=''  required>
        <input name='treff_zeit_start' type='time' placeholder='Uhrzeit' value=''  required> Uhr <br>
        <label> Termin-Ende </label>
        <input name='treff_datum_ende' type='date' placeholder='Datum' value=''  required>
        <input name='treff_zeit_ende' type='time' placeholder='Uhrzeit' value=''  required> Uhr <br>

        <!--Kommentar-->
        <label> Zusätzliche Informationen für Ihren Dolmetscher:  </label><br>
        <textarea name='kommentar' rows='5'></textarea><br>

        <!--AGB-Bestätigung-->
        <input type='checkbox' name='agb' required>
        <label>Hiermit erkläre ich mich mit den Allgemeinen Geschäftsbedingungen der ITC-Bremerhaven einverstanden</label><br>
    

        <button type='submit' >Abschicken</button> 
    </form>
</nav>
    ";
    //Ich denke das hier brauchen wir nicht mehr
    //onclick='anfrage_antwort(this)'
}
function formUbersetzerDolmetscherAnlegen($conn){
    include("scripts/sprachen.php");
    $sprachen = get_all_sprachen($conn);
    // vorname  TEXT,
    // nachname TEXT,
    // geschlecht TEXT,
    // gbdatum TEXT,
    // staatsang TEXT,
    // gbort TEXT,
    // beruf TEXT,
    // email TEXT,
    // tel TEXT,
    // Zeilenpreis TEXT,
    // adresse INT,
return "<h2> Übersetzer/Dolmetscher anlegen </h2><br>
        <form method='post' action='./auftragnehmer_angelegt.php'>
            <label> Vorname* </label> 
            <input id=\"v_name\" value=\"\" type=\"text\" name=\"vorname\" placeholder='Vorname' required> <br>
            <label> Nachname* </label>
            <input id=\"n_name\" value=\"\" type=\"text\" name=\"name\" placeholder='Namchname' required> <br>
            <label for='ge_id'>Geschlecht</label>
            <select name='geschlecht' id='geschlecht' defaultValue=''>
                <option value='m'>männlich</option>
                <option value='w'>weiblich</option>
                <option value='d'>divers</option>
            </select><br>
            <label> Geburtsdatum </label>      
            <input id='geburtsdatum' type='date' name='geburtsdatum' placeholder='Geburtsdatum' value='' > <br>

            <label> Geburtsort </label>      
            <input id='geburtsort' type='text' name='geburtsort' placeholder='Geburtsort' value=''> <br>


            <label> Nationalität </label>      
            <input id='staatsang' type='text' name='staatsang' placeholder='Bitt ein Land eingeben' value=''> <br>

            <label> Beruf </label>      
            <input id='beruf' type='text' name='beruf' placeholder='Beruf' value='' > <br>
            

            <label> E-Mail </label>
            <input id=\"email\" value=\"\" type=\"text\" placeholder='Email' name='email' required> <br>
            <label> Telefonnummer </label>
            <input id='telefonnummer' value=\"\" type=\"numbers\" placeholder='Telefonnummer' name=\"telefonnummer\"> <br> 
            
            <label for='Zeilenpreis'>Zeilenpreis</label>
            <input id='zeilenpreis' value='' type='text' placeholder='Zeilenpreis' name='zeilenpreis'>
            <br>
            <label> Straße </label> 
            <input id='st_id' type='text' name='strasse' placeholder='Straße' value='' required>
            <label> Nr. </label> 
            <input id='hausnr_id' type='text' name='hausnummer' placeholder='Hausnr.' value='' required>
            <label> PLZ </label> 
            <input id='plz_id' type='text' name='postleitzahl' placeholder='PLZ' value='' required>
            <label> Ort </label> 
            <input id='ort_id' type='text' name='ort' placeholder='Ort' value='' required> <br>
            
            
            <Section>
            <label for='dol_ldolmetscherSpracheable_id'>Dolmetscher Sprachen</label></p>
            <select size='10' name='dolmetscherSprache' id='dolmetscherSprache' defaultValue='null' multiple>
                <option disabled selected value> -- wähle eine option -- </option>
                $sprachen
                </select>
                <p style=\"font-size:10px\" >Für mehr als eine Auswahl STR <br> (windows) oder command (mac) <br>gedrückt halten.</p>
            </Section>
            
            <Section>
                <p><label for='ubersetzerSprachen'>Übersetzer Sprachen</label></p>
                <select  size='10' name='ubersetzerSprache' id='ubersetzerSprachen' defaultValue='null' multiple>
                    <option disabled selected value> -- wähle eine option -- </option>
                    $sprachen
                </select>
                <p style=\"font-size:10px\" >Für mehr als eine Auswahl STR <br> (windows) oder command (mac) <br>gedrückt halten.</p>
            </Section>
            
            <Section>
                <p><label for='beideVarianten'>Beide Varianten</label></p>
                <select size='10' name='beideVarianten' id='beideVarianten' defaultValue='null' multiple>
                <option disabled selected value> -- wähle eine option -- </option>
                    $sprachen
                </select>
                <p style=\"font-size:10px\" >Für mehr als eine Auswahl STR <br> (windows) oder command (mac) <br>gedrückt halten.</p>
            </Section>
            
            <Section>
                <p><label for='mutterSprache'>Mutter Sprache</label></p>
                <select size='10' name='mutterSprache' id='mutterSprache' defaultValue='null' multiple>
                <option disabled selected value> -- wähle eine option -- </option>   
                    $sprachen
                </select>
                <p style=\"font-size:10px\" >Für mehr als eine Auswahl STR <br> (windows) oder command (mac) <br>gedrückt halten.</p>
            </Section><br>

            <button id='email' type='submit'> Mittler anlegen </button>
        </form>";
}
?>


