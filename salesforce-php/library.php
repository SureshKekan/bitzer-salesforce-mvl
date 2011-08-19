<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: login.php");
}

?>
<!DOCTYPE HTML SYSTEM "http://www.bitzermobile.com/bitzer/dtd/HTML401-loose-bitzer.dtd">
<html>
    <head>

      <title>Salesforce - Bitzer</title>

    </head>
    <body>
        <h2>Salesforce</h2>

<!-- Library Definitions -->
         <ul data-bitzer-library-name="Salesforce"
    			data-bitzer-library-desc="Salesforce Demo"
                        data-bitzer-library-image="web/assets/images/sflogo.png"
			data-bitzer-library-style="TABLE">

<!-- Component Definitions  -->
                <li data-bitzer-components="true">Components

<!-- Form and Table Definitions -->
			<ul>
                                <li data-bitzer-form-name="accounts"
                        	data-bitzer-image-url="web/assets/images/accounts.png">
                                    <a HREF="web/accounts/form.php">Accounts</a>
                                    <ul>
                                        <li data-bitzer-table-id="accounts-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/accounts/view.php">Accounts View</a>
                                        </li>
                                    </ul>
                		</li>

				<li data-bitzer-form-name="contacts"
                        	data-bitzer-image-url="web/assets/images/contacts.png">
                                    <a HREF="web/contacts/form.php">Contacts</a>
                                    <ul>
                                        <li data-bitzer-table-id="contacts-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/contacts/view.php">Contacts View</a>
                                        </li>
                                    </ul>
                		</li>

                                <li data-bitzer-form-name="opportunities"
                        	data-bitzer-image-url="web/assets/images/opportunities.png">
                                    <a HREF="web/opportunities/form.php">Opportunities</a>
                                    <ul>
                                        <li data-bitzer-table-id="opportunities-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/opportunities/view.php">Opportunities View</a>
                                        </li>
                                    </ul>
                		</li>

                                <li data-bitzer-form-name="leads"
                        	data-bitzer-image-url="web/assets/images/leads.png">
                                    <a HREF="web/leads/form.php">Leads</a>
                                    <ul>
                                        <li data-bitzer-table-id="leads-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/leads/view.php">Leads View</a>
                                        </li>
                                    </ul>
                		</li>

                                <li data-bitzer-form-name="documents"
                        	data-bitzer-image-url="web/assets/images/documents.png">
                                    <a HREF="web/documents/form.php">Documents</a>
                                    <ul>
                                        <li data-bitzer-table-id="documents-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/documents/view.php">Documents View</a>
                                        </li>
                                    </ul>
                		</li>

                                <li data-bitzer-form-name="products"
                        	data-bitzer-image-url="web/assets/images/products.png">
                                    <a HREF="web/products/form.php">Products</a>
                                    <ul>
                                        <li data-bitzer-table-id="products-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/products/view.php">Products View</a>
                                        </li>
                                    </ul>
                		</li>

                                <!--<li data-bitzer-form-name="events"
                        	data-bitzer-image-url="web/assets/images/events.png">
                                    <a HREF="web/events/form.php">Events</a>
                                    <ul>
                                        <li data-bitzer-table-id="events-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/events/view.php">Events View</a>
                                        </li>
                                    </ul>
                		</li>

                                <li data-bitzer-form-name="tasks"
                        	data-bitzer-image-url="web/assets/images/tasks.png">
                                    <a HREF="web/tasks/form.php">Tasks</a>
                                    <ul>
                                        <li data-bitzer-table-id="tasks-view"
                                            data-bitzer-last-modified="2011-07-27 19:18:00 PST">
                                               	<a HREF="web/tasks/view.php">Tasks View</a>
                                        </li>
                                    </ul>
                		</li>-->
			</ul>
        	</li>
     </ul>
<!-- Dataview without BITZER Mobile support -->
    </body>
</html>
