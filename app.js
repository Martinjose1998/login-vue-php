var app = new Vue({
    el: '#app',
    data: {
      message: 'Welcome!',
      email: '',
      pass: '',
      pass2:'',
      username: '',
      info: null,
      logged : null,
      formState: false
    },
    mounted ()
    {
            
    },
    methods :
    {
        login:function(a,b)
        {
            if(a != '' && b != '')
            {
                axios.post('api_rest.php?action=login&email='+a+'&pass='+b)
                .then(function(response){ if(response.data == 'no'){alert('User does not exist or password is incorrect')} })
                    location.replace("feed.php");
                
            }
        },
        register:function(a,b,c,d)
        {
            if(c == d)
            {
                axios.post('api_rest.php?action=register&email='+b+'&username='+a+'&pass='+c)
                .then(response => alert(response.data))
            }
            else
            {
                alert("Passwords are different");
            }
        }
    }
  })