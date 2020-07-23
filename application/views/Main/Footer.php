<script type="text/javascript" src="<?php echo base_url('assets/js/artyom.window.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/artyom.window.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/artyom.min.js');?>"></script>

<script>

	function readnav()
	{
		var Jarvis = new Artyom();
		Jarvis.initialize({
          lang:"hi-IN",// More languages are documented in the library
         
          debug:true,//Show everything in the console
        });

		if(document.activeElement.tagName.toLowerCase()=="a")
		{
    		Jarvis.say(document.activeElement.title + "Link");
		}
		else if(document.activeElement.tagName.toLowerCase()=="input")
		{
    		Jarvis.say(document.activeElement.title + "EditText");
		}
		else
		{
    		Jarvis.say(document.activeElement.title);
		}
	}

</script>

<script>
	function readnews()
	{
		var Jarvis = new Artyom();
		Jarvis.initialize({
          lang:"hi-IN",// More languages are documented in the library

          debug:true,//Show everything in the console

        });
    	Jarvis.say(document.activeElement.title);

	}
</script>

<script>

	// document.activeElement.onclick = function() 
	// {
	// 	var Jarvis = new Artyom();
	// 	Jarvis.initialize({
 //          lang:"hi-IN",// More languages are documented in the library
 //          debug:true,//Show everything in the console

 //        });
 //    	Jarvis.say(document.activeElement.title + "Link Selected");
	// }
</script>

<script>
	function search()
	{
		var Jarvis = new Artyom();
		Jarvis.initialize({
         lang:"en-US",// More languages are documented in the library
          continuous:true,//if you have https connection, you can activate continuous 
          debug:true,//Show everything in the console
         listen:true // Start listening when this function is triggered
       });
		
		Jarvis.say("Search Selected! Speak to Search"); 
	}
	
</script>

<script>

	window.onload = function() 
	{

		console.log("loading window....")

		const artyom = new Artyom();
		artyom.initialize({
         lang:"en-US",// More languages are documented in the library
          continuous:true,//if you have https connection, you can activate continuous 
          debug:true,//Show everything in the console
         listen:true, // Start listening when this function is triggered
         soundex:true,
        }).then(function(){
        artyom.say("VoiceVis has been correctly initialized");
        
    }).catch(function(){
        artyom.say("An error occurred during the initialization");
    });

		var commandBack = {
			smart:true,
		    indexes:["Go Back * "], 
		    action:function(i,wildcard)
		    { 
		    	var id=document.activeElement.tabIndex;
		    	if(id==2)
		    	{
		    		artyom.say("Cannot Go Back !");
		    	}
		    	else
		    	{
		    		var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
				    for(var i=0; i<tabbables.length; i++) 
				    { //loop through each element
				        if(tabbables[i].tabIndex == (id-1))
				         { //check the tabindex to see if it's the element we want
				     		artyom.say("Going Back to previous link");
				            tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
				            break;
				        }
    				}

		    	}

		        
		    }
		};
		artyom.addCommands(commandBack); 


			var commandForward = {
			smart:true,
		    indexes:["Go Ahead * ","Next Jarvis *"], 
		    action:function(i,wildcard)
		    { 
		    	var id=document.activeElement.tabIndex;
		    	
	    		var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
			    for(var i=0; i<tabbables.length; i++) 
			    { //loop through each element
			        if(tabbables[i].tabIndex == (id+1))
			         { //check the tabindex to see if it's the element we want
			     		artyom.say("Going Ahead to Next link");
			            tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
			            break;
			        }
				}

		    	

		        
		    }
		};
		artyom.addCommands(commandForward); 


		var commandKill = {
			smart:true,
		    indexes:["Stop *"], 
		    action:function(i,wildcard)
		    { 
		    		  artyom.shutUp();
		    }
		};
		artyom.addCommands(commandKill); 

		var commandread = {
			
		    indexes:["Read Again"], 
		    action:function()
		    { 
		    		  artyom.say(document.activeElement.title);
		    }
		};
		artyom.addCommands(commandread); 

		var commandNews = {
			smart:true,
		    indexes:["Come To The Point * "], 
		    action:function(i,wildcard)
		    { 
		    	var id=document.activeElement.tabIndex;
		    	
	    		var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
			    for(var i=0; i<tabbables.length; i++) 
			    { //loop through each element
			        if(tabbables[i].tabIndex == 9)
			         { //check the tabindex to see if it's the element we want
			     		artyom.say("Going Ahead to News");
			            tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
			            break;
			        }
				}

		    	

		        
		    }
		};
		artyom.addCommands(commandNews); 


		var commandRefresh = {
			smart:true,
		    indexes:["Refresh The Page * "], 
		    action:function(i,wildcard)
		    { 
		    	artyom.say("Refreshing The Page");
		    	location.reload();
		    }
		};
		artyom.addCommands(commandRefresh);



		var commandSelect = {
			smart:true,
		    indexes:["Visit * "], 
		    action:function(i,wildcard)
		    { 
		    	artyom.say("Visiting "+document.activeElement.title);
		    	document.activeElement.click();
		    	
		    }
		};
		artyom.addCommands(commandSelect);  


		var commandGoCats = {
			smart:true,
		    indexes:["Go To * "], 
		    action:function(i,wildcard)
		    { 
		    	var id=document.activeElement.tabIndex;
	    		var tabbables = document.querySelectorAll(".tabable"); //get all tabable elements
			    for(var i=0; i<tabbables.length; i++) 
			    { //loop through each element
			        if(tabbables[i].title.toUpperCase() === wildcard.toUpperCase())
			         { //check the tabindex to see if it's the element we want
			     		artyom.say("Going Ahead to" + wildcard);
			     
			            tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
			            break;
			        }
				}

		    	

		        
		    }
		};
		artyom.addCommands(commandGoCats); 

		var commandSearch = {
			smart:true,
		    indexes:["Search for *"], 
		    action:function(i,wildcard)
		    { 

		    	var k = document.querySelectorAll(".searchbar");
		        k[0].focus();
		        console.log(document.activeElement.id);

		        artyom.say("searching for" + wildcard.trim());
		        document.getElementById("inputsearch").value = wildcard;
		        window.location.href = "<?php echo site_url('LandingPageController/Search');?>?keyword="+wildcard;
		    }
		};
		artyom.addCommands(commandSearch); 


	};

</script>
