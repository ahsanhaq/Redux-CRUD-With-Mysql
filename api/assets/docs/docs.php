<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Imali APP Documentation</title>
  <link rel="alternate" type="application/rss+xml" title="frittt.com" href="feed/index.html">
  <link href="http://fonts.googleapis.com/css?family=Raleway:700,300" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/prettify.css">
  <style>
  table {
    border-collapse: collapse;
    width: 100%;
    margin: 0 0 20px 0;
  }
  table {
    max-width: 100%;
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
  }
  thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
  }
  tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
  }
  tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
  }
  th {
    background-color: #f5f5f5;
    text-align: left;
    font-family: "Source Sans Pro", sans-serif;
    font-weight: 700;
    padding: 4px 8px;
    border: #e0e0e0 1px solid;
  }
  td, th {
    display: table-cell;
    vertical-align: inherit;
  }
  th, td {
    font-family: "Source Sans Pro", sans-serif;
    font-weight: 400;
    font-size: 16px;
  }
  td {
    vertical-align: top;
    padding: 2px 8px;
    border: #e0e0e0 1px solid;
  }
  td.code {
    font-size: 14px;
    font-family: "Source Code Pro";
    font-style: normal;
    font-weight: 400;
  }
  td .description {
    color: #808080;
  }
  .highlight{
    border: 1px solid #e1e4e5;
    padding: 0px;
    overflow-x: auto;
    background: #fff;
    margin-bottom: 5px;
  }
  .highlight pre {
    white-space: pre;
    margin: 0;
    padding: 12px 12px;
    font-family: Consolas,"Andale Mono WT","Andale Mono","Lucida Console","Lucida Sans Typewriter","DejaVu Sans Mono","Bitstream Vera Sans Mono","Liberation Mono","Nimbus Mono L",Monaco,"Courier New",Courier,monospace;
    font-size: 12px;
    line-height: 1.5;
    display: block;
    overflow: auto;
    color: #404040;
  }
  .highlight .url_title{
    float: left;
    background: #F2D600;
  }
  .highlight .url{
    float: left;
  }
  .highlight .method_type{
    float: right;
    background: #61BD4F;
  }
  .cont{
    border-bottom: 1px solid #f5f5f5;
    padding-bottom: 5px;
  }
  </style>
</head>
<body>
<div class="wrapper">
<nav style="border-bottom: 5px solid #000;"> 
  	<div class="pull-left">
    	<h1><a href="javascript:"><img src="img/icon.png" alt=" APP Documentation" />
        <span>APP Documentation</span></a></h1>
    </div>
</nav>
<section>
  <div class="container">
    <ul class="docs-nav">
      <li><strong>User</strong></li>
      <li><a href="#signup" class="cc-active">SignUp</a></li>
      <li><a href="#signin" class="cc-active">SignIn</a></li>
      <li><a href="#createstream" class="cc-active">CreateStream</a></li>
      <li><a href="#archievedStreams" class="cc-active">ArchievedStreams</a></li>
      <li><a href="#trendingStreams" class="cc-active">TrendingStreams</a></li>
      <li><a href="#liveStreams" class="cc-active">LiveStreams</a></li>
      <li><a href="#addComment" class="cc-active">AddComment</a></li>
      <li><a href="#getComment" class="cc-active">GetComment</a></li>
      <li><a href="#getStreamdetail" class="cc-active">getStreamdetail</a></li>
      <li><a href="#likeStream" class="cc-active">LikeStream</a></li>
      <li><a href="#unLike" class="cc-active">UnLike</a></li>
    </ul>

    <div class="docs-content">    
      <h3 id="signup">SignUp</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/signup/register
</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="code">fullName</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>          
          <td class="code">email</td>
          <td><span class="description">Required (The Email field must be at least 5 characters in length)</span></td>
        </tr>
        <tr>
          <td class="code">birthYear</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">race</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">state</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">city</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">password</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">accountType</td>
          <td><span class="description">Required(1 for facebook, 2 for gmail, 3 for twitter, 4 for manual)</span></td>
        </tr>
        <tr>
          <td class="code">deviceId</td>
          <td><span class="description">Required</span></td>
        </tr>
        </tbody>
      </table>     
      <pre class="prettyprint">
{
  "error": false,
  "fullName": "Faisal",
  "race": "African American",
  "city": "Miami",
  "message": "You are successfully registered"
}
      </pre>
      
      
      <h3 id="signin">SignIn</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/SignIn</pre>
          <pre class="method_type">POST</pre>
      </div>
      <ul>
        <li>Manual</li>
      </ul>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="code">email</td>
          <td><span class="description">Required (The Email field must be at least 5 characters in length)</span></td>
        </tr>
        <tr>
          <td class="code">password</td>
          <td><span class="description">Required</span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">
{
  "error": false,
  "user": {
    "user_id": "12",
    "fullName": "Faisal",
    "email": "mfaisal@devdesks.com",
    "birthYear": "1993",
    "race": "African American",
    "state": "Florida",
    "accType": "4"
    "deviceId": "344343"
  }
}

{
  "error": true,
  "message": "The Email field is required. The Password field is required."
}
      </pre>
	  
	  
	       
      <h3 id="createstream">CreateStream</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/CreateStream</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="code">userId</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">latitude</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">longitude</td>
          <td><span class="description">Required</span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">
{
  "error": false,
  "stream": {
    "streamUrl": "rtmp://144.76.137.153:1935/live2/1_2016-08-08_11:50:10"
  }
}

      </pre>
      
 

      <h3 id="archievedStreams">ArchievedStreams</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Streams/archievedStreams</pre>
          <pre class="method_type">POST</pre>
      </div>
      <pre class="prettyprint">
{
  "error": false,
  "streams": [
    {
      "streamId": "111",
      "userName": "Zain Ul Abideen",
      "userId": "19",
      "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/19_1470912559.jpg",
      "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/19_1470912559.mp4",
      "city": "er",
      "status": "recorded",
      "totallikes": "12"
    },
    {
      "streamId": "112",
      "userName": "Nauman Malik",
      "userId": "36",
      "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/36_1470912564.jpg",
      "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/36_1470912564.mp4",
      "city": "New York",
      "status": "recorded",
      "totallikes": "0"
    },
  ]
}

      </pre> 
    
	
      <h3 id="trendingStreams">TrendingStreams</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Streams/trendingStreams</pre>
          <pre class="method_type">POST</pre>
      </div>
      <pre class="prettyprint">
{
  "error": false,
  "streams": [
    {
      "streamId": "111",
      "userName": "Zain Ul Abideen",
      "userId": "19",
      "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/19_1470912559.jpg",
      "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/19_1470912559.mp4",
      "city": "er",
      "status": "recorded",
      "totallikes": "12"
    },
    {
      "streamId": "112",
      "userName": "Nauman Malik",
      "userId": "36",
      "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/36_1470912564.jpg",
      "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/36_1470912564.mp4",
      "city": "New York",
      "status": "recorded",
      "totallikes": "0"
    },
  ]
}

{
  "error": true,
  "message": "No Trending Streams Found"
}


		  </pre> 

      <h3 id="liveStreams">LiveStreams</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Streams/liveStreams</pre>
          <pre class="method_type">POST</pre>
      </div>
      <pre class="prettyprint">
{
  "error": false,
  "streams": [
    {
      "streamId": "111",
      "userName": "Zain Ul Abideen",
      "userId": "19",
      "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/19_1470912559.jpg",
      "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/19_1470912559.mp4",
      "city": "er",
      "status": "recorded",
      "totallikes": "12"
    },
    {
      "streamId": "112",
      "userName": "Nauman Malik",
      "userId": "36",
      "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/36_1470912564.jpg",
      "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/36_1470912564.mp4",
      "city": "New York",
      "status": "recorded",
      "totallikes": "0"
    },
  ]
}

{
  "error": true,
  "message": "No live Streams Found"
}

      </pre> 

	  
	        
      <h3 id="addComment">AddComment</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Comments/addComment</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="code">userId</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">streamId</td>
          <td><span class="description">Required</span></td>
        </tr>
        <tr>
          <td class="code">comment</td>
          <td><span class="description">Required(Only text)</span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">
{
  "error": false,
  "message": "Comment added"
}

{
  "error": true,
  "message": "The User ID field is required. The Stream Id field is required.
  The Comment field is required."
}
      </pre>
	

	      <h3 id="getComment">GetComment</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Comments/getComment</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
          <td class="code">streamId</td>
          <td><span class="description">Required</span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">
{
  "error": false,
  "comments": [
    {
      "commentId": "1",
      "userId": "1",
      "streamId": "1",
      "comment": "first comment",
      "timeStamp": "2016-08-10 07:28:31",
      "fullName": "Faisal"
    }
  ]
}
{
  "error": true,
  "message": "The Stream Id field is required."
}
      </pre>



	      <h3 id="getStreamdetail">GetStreamdetail</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Streams/getStreamdetail</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
          <td class="code">streamId</td>
          <td><span class="description">Required</span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">

{
  "error": false,
  "stream": {
    "streamId": "111",
    "userName": "Zain Ul Abideen",
    "url": "http://dev-web.devdesks.com/copcritic/assets/UserVideos/19_1470912559",
    "userId": "19",
    "thumb": "http://dev-web.devdesks.com/copcritic/assets/streamThumbs/19_1470912559jpg",
    "city": "er",
    "zip": "11101",
    "streamStatus": "recorded",
    "timeStamp": "2016-08-11 06:49:39"
  }
}	  
	  
{
  "error": true,
  "message": "The Stream id field is required."
}
      </pre>	  
	
	
		      <h3 id="likeStream">likeStream</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Likes/likeStream</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
          <td class="code">streamId</td>
          <td><span class="description">Required</span></td>
        </tr>
          <td class="code">userId</td>
          <td><span class="description">Required</span></td>
        </tr>
          <td class="code">like</td>
          <td><span class="description">Required(like=1,2,3,4 1=simple like, other emojis)</span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">
{
  "error": false,
  "streams": "Stream Liked"
}

{
  "error": true,
  "message": "The Stream id field is required. The User id field is required. The Like value field is required."
}
      </pre>
	  
	  
	  	
		      <h3 id="unLike">UnLike</h3>
      <div class="highlight">
          <pre class="url_title">URL</pre>
          <pre class="url">http://dev-web.devdesks.com/copcritic/API/Likes/unLike</pre>
          <pre class="method_type">POST</pre>
      </div>
      <table>
        <thead>
        <tr>
          <th style="width: 30%">Fields</th>
          <th style="width: 70%">Description</th>
        </tr>
        </thead>
        <tbody>
          <td class="code">userId</td>
          <td><span class="description">Required</span></td>
        </tr>
          <td class="code">streamId</td>
          <td><span class="description">Required</span></td>
        </tr>
          <td class="code">comment</td>
          <td><span class="description"></span></td>
        </tr>
        </tbody>
      </table>
      <pre class="prettyprint">
{
  "error": false,
  "streams": "Un Liked"
}

{
  "error": true,
  "message": "The Stream id field is required. The User id field is required."
}
      </pre>
	
    </div>
  </div>
</section>
<footer>
  <div class="">
    <p> &copy; All Rights Reserved.</p>
  </div>
</footer>
</div>
<script src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/prettify/prettify.js"></script> 
<!--<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=sunburst"></script>-->
<script src="js/layout.js"></script>
<script>
$(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});
</script>
</body>
</html>