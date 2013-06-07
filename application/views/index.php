<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>

		<script href="<?php echo base_url(); ?>js/html5shiv.js"></script>
		<script href="<?php echo base_url(); ?>js/modernizr-latest.js"></script>
		<link href="<?php echo base_url(); ?>css/layout.css" rel="stylesheet" type="text/css" />
		<!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /-->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script-->
		<!-- -->
		<!-- Attach CSS files -->
	
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css"/>
		 <link rel="shortcut icon"  href="<?php echo base_url(); ?>/images/favicon.ico">
		
		<style type="text/css">
		
		   body {
				font-family: "Helvetica Neue", Helvetica, Arial, Verdana, sans-serif;
				color: #3F3F38;
				margin: 0;
				padding: 0;
				font: 13px     / 1.231 arial, helvetica, clean, sans-serif;
				line-height: 1;
				font-size: 80%;
				vertical-align: baseline;
			}
		    
		    .ui-autocomplete {
		        max-height: 100px;
		        overflow-y: auto;
		        /* prevent horizontal scrollbar */
		        overflow-x: hidden;
		        background:#FFFFFF;
		        border:1px solid #999;
		        width:25%;
		    }
		    .ui-menu-item{
		    	cursor:pointer;
		    }
		    .ui-menu-item:hover{
		    	color:#3333FF;
		    	cursor:hand;
		    }
		    /* IE 6 doesn't support max-height
		     * we use height instead, but this forces the menu to always be this tall
		     */
		    html .ui-autocomplete {
		        height: 100px;
		    }
		    .ui-autocomplete-loading {
        		background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
    		}
    		
    		.custom-combobox {
		    position: relative;
		    display: inline-block;
		  }
		  .custom-combobox-toggle {
		    position: absolute;
		    top: 0;
		    bottom: 0;
		    margin-left: -1px;
		    padding: 0;
		    /* support: IE7 */
		    *height: 1.7em;
		    *top: 0.1em;
		  }
		  .custom-combobox-input {
		    margin: 0;
		    padding: 0.3em;
		  }
    		
			#signup_form{ 
			background-color:whiteSmoke; 
			border: 1px solid #E5E5E5;
			padding: 20px 25px 15px;
			width:500px;
			margin:0 auto;
			margin-top:10%;
			}
			#signup_form input[type="submit"] {
			margin: 0 1.5em 1.2em 0;
			height: 32px;
			font-size: 13px;
			}
			#signup_form label{
			display: block;
			margin: 0 auto 1.5em auto;
			width:300px;
			 
			}
			.label {
			font-weight: bold;
			margin: 0 0 .5em;
			display: block;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			color:#036;
			}
			.remember-label {
			font-weight: normal;
			color: #666;
			line-height: 0;
			padding: 0 0 0 .4em;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			}
			#system_title{ 
				position: absolute;
				top: 50px;
				left: 110px;
				text-shadow: 0 1px rgba(0, 0, 0, 0.1);
				letter-spacing: 1px;
			}
			.banner_text {
			font-weight: 100;
			letter-spacing: -1px;
			margin: 0 0 10px 95px;
			font-size: 28px;
			color: #3F3F38;
			width: 200px;
			height: 30px;
			display: block;
			overflow: hidden;
			text-shadow: none;
			text-shadow: 0 1px rgba(0, 0, 0, 0.1);
			
			.error {
			font-family: inherit;
			font-size: inherit;
			color: #F33;
			border-color: #F33;
		}
		}
     </style>
		
		<!--link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css"/-->
		<!-- Attach JavaScript files -->
		<!--script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery.orbit.js" type="text/javascript"></script-->
		<script src="<?php echo base_url(); ?>js/js_libraries.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/js_ajax_load.js" type="text/javascript"></script>
		<script>
			$().ready(function(){
			//query on user type
			/*$(function(){
					//load json data
					 var cache = {},lastXhr;
				    $( "#username" ).autocomplete({
				    	 	delay: 500,
				    	 	minLength: 2,
				            source: function( request, response ) {
				                var term = request.term;
				                if ( term in cache ) {
				                    response( cache[ term ] );
				                    return;
				                }
				 
				                $.getJSON( '<?php echo base_url();?>c_load/suggestFacilityName', request, function( data, status, xhr ) {
				                    cache[ term ] = data;
				                    response( data );
				                });
				            }
				    });
		
				});//end of $(function(){*/
					
			
			//using select box
			(function( $ ) {
			$.widget( "custom.combobox", {
			  _create: function() {
			    this.wrapper = $( "<span>" )
			      .addClass( "custom-combobox" )
			          .insertAfter( this.element );
			 
			        this.element.hide();
			        this._createAutocomplete();
			        this._createShowAllButton();
			      },
			 
			      _createAutocomplete: function() {
			        var selected = this.element.children( ":selected" ),
			      value = selected.val() ? selected.text() : "";
			 
			        this.input = $( "<input>" )
			      .appendTo( this.wrapper )
			      .val( value )
			      .attr( "title", "" )
			      .addClass( "ui-widget-content ui-state-default ui-corner-left" )
			      .autocomplete({
			        delay: 0,
			        minLength: 0,
			        source: $.proxy( this, "_source" )
			      })
			      .tooltip({
			        tooltipClass: "ui-state-highlight"
			          });
			 
			        this._on( this.input, {
			          autocompleteselect: function( event, ui ) {
			            ui.item.option.selected = true;
			            this._trigger( "select", event, {
			              item: ui.item.option
			            });
			          },
			 
			          autocompletechange: "_removeIfInvalid"
			        });
			      },
			 
			      _createShowAllButton: function() {
			        var input = this.input,
			          wasOpen = false;
			 
			        $( "<a>" )
			      .attr( "tabIndex", -1 )
			      .attr( "title", "All Facility Names" )
			      .tooltip()
			      .appendTo( this.wrapper )
			      .button({
			        icons: {
			          primary: "ui-icon-triangle-1-s"
			        },
			        text: false
			      })
			      .removeClass( "ui-corner-all" )
			      .addClass( "custom-combobox-toggle ui-corner-right" )
			      .mousedown(function() {
			        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
			          })
			          .click(function() {
			            input.focus();
			 
			            // Close if already visible
			            if ( wasOpen ) {
			              return;
			            }
			 
			            // Pass empty string as value to search for, displaying all results
			        input.autocomplete( "search", "" );
			          });
			      },
			 
			      _source: function( request, response ) {
			        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
			      response( this.element.children( "option" ).map(function() {
			          var text = $( this ).text();
			          if ( this.value && ( !request.term || matcher.test(text) ) )
			            return {
			              label: text,
			              value: text,
			              option: this
			            };
			        }) );
			      },
			 
			      _removeIfInvalid: function( event, ui ) {
			 
			        // Selected an item, nothing to do
			        if ( ui.item ) {
			          return;
			        }
			 
			    // Search for a match (case-insensitive)
			    var value = this.input.val(),
			      valueLowerCase = value.toLowerCase(),
			      valid = false;
			    this.element.children( "option" ).each(function() {
			          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
			            this.selected = valid = true;
			            return false;
			          }
			        });
			 
			        // Found a match, nothing to do
			        if ( valid ) {
			          return;
			        }
			 
			    //Remove invalid value
			    this.input
			      .val( "" )
			      .attr( "title", value + " didn't match any item" )
			      .tooltip( "open" );
			    this.element.val( "" );
			    this._delay(function() {
			      this.input.tooltip( "close" ).attr( "title", "" );
			    }, 2500 );
			    this.input.data( "ui-autocomplete" ).term = "";
			      },
			 
			      _destroy: function() {
			        this.wrapper.remove();
			        this.element.show();
			      }
			    });
			  })( jQuery );
			  
			   $( "#username" ).combobox();
			});
		</script>
	</head>
	<body>
		

		<!--div class="message">
			<?php #echo $form; ?>
		</div-->
		<!--div class="login">
			<div class="form-title">
				
			</div>
			<form id="signup_form1" class="" method="post" accept-charset="utf-8" action="<?php echo base_url().'c_auth/go'?>">
                 <label>Facility Name</label>
                 <div class="ui-widget">
					<input  name="username" id="username" type="text" placeholder="Facility Name" required/>
				</div>
				<p></p>
				
				<input type="submit" class="awesome myblue large" value="Continue"/>
				
			</form>
		</div-->
		<div class="banner">
			<?php $this->load->view('banner');?>
		</div>
			<div id="signup_form">
			<div class="short_title" >
			<h1 class="banner_text" align="left">User Login</h1>
			</div>
			
			<form id="form_verify" action="<?php echo base_url().'c_auth/go'?>" method="post" >
			<label>
			<strong class="label">Facility Name</strong>
			<!--input type="text" name="username" id="username" placeholder="Facility Name"-->
			<select id="username" name="username">
				<option value="">...</option>
				<?php echo $facility;?>
			</select>
			</label>
			
			<!--label>
			<strong class="label">Email</strong>
			<input type="text" name="useremail" id="useremail" value="" placeholder="Your email address">
			</label-->
			 <input type="submit" class="    button " name="start" id="start" value="Login" style="margin-left:100px;">
			<label style="display:inline">
			 <!--input type="checkbox" name="remember"> <strong class="remember-label">  Stay signed in  </strong-->
			</label>
			
			</form>
			</div>
	</body>
</html>