# WordPress Job Manager Custom Fields 
**Was du benötigst:** 

 - [WP Job Manager](https://de.wordpress.org/plugins/wp-job-manager/)
 - [Contact Listing for WP Job Manager](https://de.wordpress.org/plugins/wp-job-manager-contact-listing/)
 - [Ninja Forms – The Easy and Powerful Forms Builder](https://de.wordpress.org/plugins/ninja-forms/)
 - [WP Mail SMTP](https://de.wordpress.org/plugins/wp-mail-smtp/)

Alle Plugins sind ebenfalls noch im Repo. 

## Wie erstellst du neue Felder?

Ganz einfach. Definiere einfach einen Block und gebe ihm eine ID. Hier ein Beispiel: 

## 1. **Binde den Action Hook ein und verpasse ihm einen Funktionsnamen.**

Das ist der Filter Hook: ***job_manager_job_listing_data_fields***

   **Füge diesen Definition hinzu.:** Der Funktionsname ist freidefinierbar 
 

       add_filter( 'job_manager_job_listing_data_fields', 'bz_jobs' );
    

## 2. **Definiere die Funktion:**

		
		function bz_jobs( $fields ) {
		   // Definiere die Blöcke hier in der Funktion...
		   // Sehe Schritt 3 
         
            // Gebe alle Felder aus !! Das Event muss oben in der Funktion stehen.
			return $fields; 
		}
    

## 3. **So definierst das Feld:**

         $fields[' _Gebe hier die ID '] = array(
		       'lable'		      => __('Test'  , ' textdomain für Sprachen'), 
		       'type'			  => __' text', // Sehe die Typen Liste 
		       'placeholder'       => 'Gebe hier einen Text ein... ',
               'description'       => 'Gebe hier eine Beschreibung ein.. ', 
          );


## 4. Feldtypen Liste

|Feldtype im Backend   | Definition im Array (Was soll im Backend angezeigt werden) |
|--|--|
| Text Feld | `'type' => 'text',`
  Text Area| `'type' => 'textarea',`
  Select Liste | `'type' => 'select','options' => array('option1' => 'Option 1'),`
 WordPress Editor| `'type' => 'wp-editor',`
  Datepicker| `'type' => 'text', 'classes'     => array( 'job-manager-datepicker' ),`
  Datepicker| `'type' => 'text', 'classes'     => array( 'job-manager-datepicker' ),`
 

## 5. Felder ausgeben

Da das Plugin sogar zahlreiche Hooks und eine großartige Theme Unterstützung hat, kannst du dir aus dem Plugins Ordner von Job Manger direkt die Template kopieren und in deinem Theme Ordner einbinden. 

**Erstelle hierfür einfach einen Ordner im Hauptverzeichnis deines Themes und nenne es:** 

 

      /wp-content/themes/yourtheme/job_manager 

In diesem Ordner fügst du die ganzen Dateien aus dem Plugin Ordner /templates hinzu. Jetzt musst du einfach dein Template auswählen. Dafür installier dir das Plugin "Site Current Template" von WordPress hinzu und du siehst, welche Datei grade auf der Jobseite aktiv ist und welche du überschreiben muss. Dies ist praktisch und du kannst auch ohne Hooks quasi das Plugin überschreiben. 

Diese Funktion ist beispielhaft für andere Plugins. Alle Plugins von Automatic, also die Entwickler von WordPress, besitzen es. Als anderes Beispiel ist da Woocommerce. 

Das ist der Quelltext, um das Feld im Frontend auszugeben.

    <?php
	    
		//Ausgabe wird von Post Meta beeinflusst
		
    	$date = get_post_meta(
    		$post->ID, '_beginjob', true
    		);
    		 if($date != ''){
    			echo ('<strong>Beginn der Arbeit:</strong>'); 
				
				//Ausgabe vom Backend
    			echo date("d.m.o", strtotime($date));
		   }  
		
     ?>
