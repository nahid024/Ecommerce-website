$(document).ready(function() {
  $("#insert-product").validate({
    rules: {
      name : {
        required: true,
        minlength: 2
      },
     price: {
        required: true,
        number: true
        
      },
      description: {
        required: true,
         
      },
      status: {
        required: true
        },
       stock: {
        required: true
        },
         category: {
        required: true 
        },

       
    messages : {
      name: {
        minlength: "title should be at least 2 characters",
      },
      price: {
        required: "Please enter price",
        number:"Please enter numerical value" ,
      },
       description: {
        required: "Please enter descriptoin",
      },
      	status: {
        required: "Please enter status",
      },
       stock: {
        required: "Please enter stock",
      },
      category: {
        required: "Please enter category",
      },
     
    }
}
});
});



//insert category

$(document).ready(function() {
  $("#insert-category").validate({
    rules: {
      name : {
        required: true,
        minlength: 2
      },
     description: {
        required: true
         },
     status: {
        required: true
        },
 
 
    messages : {
      name: {
        minlength: "title should be at least 2 characters",
      },
       
       description: {
        required: "Please enter descriptoin",
      },
      	status: {
        required: "Please enter status",
      },
        
 
    }
}
});
});

//insert sub category

$(document).ready(function() {
  $("#insert-subcategory").validate({
    rules: {
      name : {
        required: true,
        minlength: 2
      },
     parent_category:{
      	required: true
      },
     description: {
        required: true
         },
     status: {
        required: true
        },
 
 
    messages : {
      name: {
        minlength: "title should be at least 2 characters",
      },
      parent_category:{
       	required: "Please enter descriptoin",
       },
       description: {
        required: "Please enter descriptoin",
      },
      	status: {
        required: "Please enter status",
      },
        
 
    }
}
});
});