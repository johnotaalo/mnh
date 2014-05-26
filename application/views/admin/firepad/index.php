<div id="firepad"></div>
    <script>
      var firepadRef = new Firebase('https://maternal-child.firebaseio.com/firepads/mnch_docs');
      var codeMirror = CodeMirror(document.getElementById('firepad'), { lineWrapping: true });
      var firepad = Firepad.fromCodeMirror(firepadRef, codeMirror,
          { richTextShortcuts: true, richTextToolbar: true });


var chatRef = new Firebase('https://maternal-child.firebaseio.com/firepads/mnch_docs');
var auth = new FirebaseSimpleLogin(chatRef, function(error, user) {
  if (error) {
    // an error occurred while attempting login
    console.log(error);
  } else if (user) {
    // user authenticated with Firebase
    console.log('User ID: ' + user.uid + ', Provider: ' + user.provider);
  } else {
    // user is logged out
  }
});

    </script>
