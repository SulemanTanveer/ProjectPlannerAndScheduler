var fs    = require('fs');
var sloc  = require('sloc');
var testFolder = './tests/';
var path = require('path');

fs.readdir(testFolder, (err, files) => {
  files.forEach(file => {
	  
	//console.log(file);
	 fs.readFile("./tests/"+file, "utf8", function(err, code){
		
	 
  if(err){ console.error(err); }
  else{
	   var exten =path.extname(file);
	   exten = exten.substr(1);
       var stats = sloc(code,exten);
	  // console.log(file);
	  // console.log(exten);
	
       for(i in sloc.keys){
		 var k = sloc.keys[i];
		// if(k=="source")
	
			console.log(k + " : " + stats[k]);
	  
		}	
	
	
	
	
	
	}
});
	  
	
    
  });
  
});


