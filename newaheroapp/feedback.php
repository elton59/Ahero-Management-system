

	<?php
		                                    if(isset($_POST["fdmail"]))
											{
                                               $fdmail=$_POST["fdmail"];
											}
											if(isset($_POST["fdreview"]))
											{
                                               $fdreview=$_POST["fdreview"];
											}
											if(isset($_POST["frating"]))
											{
                                               $fdrating=$_POST["fdrating"];
											}
											//sql
											if(isset($_POST["fdsubmit"]))
											{
                                               $fdmail=$_POST["fdmail"];
                                               $fdreview=$_POST["fdreview"];
                                               $fdrating=$_POST["fdrating"];
                                               $servername = "localhost";
                                              $username = "root";
                                               $password = "";
                                                 $db = "Ahero";

                                                  // Create connection
                                                 $mysqli= new mysqli($servername, $username, $password,$db);

                                                  // Check connection
                                                
                                              $result=$mysqli->query("INSERT INTO feedback(email,message,rating) VALUES('$fdmail','$fdreview','$fdrating')")or die($mysqli->error);
                                           
                                              echo "<script>alert('thank you for sending us you feedback')
                                                 window.location.replace('index.php')
                                                 </script>";
                                               

											
										
										
									}
											?>	