<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <title>Chatting | APP</title>
  <link rel="shortcut icon" href="#" type="image/x-icon">

  <!-- angular JS cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <!-- <script>
    const senderIdSession = localStorage.getItem('sender_id');
    // console.log(senderIdSession);
  </script> -->
</head>

<body ng-app="index-app" ng-controller="index-controller" ng-cloak>

  <header class="continer">

    <div class="left">
      <div class="img_n_name" ng-click="showProfilePopup()">
        <img id="login_user_image_id" ng-src="{{currentUserImage}}" alt="{{currentUserName}}">
        <div>
          <p id=""><strong id="userName">{{currentUserName}}</strong></p>
          <p class="online">Online</p>
        </div>
      </div>

      <div class="dropdown">
        <a class="dropdown-button" ng-click="showDropdownMenu()">
          <i class="fi fi-rr-menu-dots-vertical"></i>
        </a>
        <div class="dropdown-content" ng-show="isDropdownMenu">
          <a id="logout" ng-click="logOut()">Logout</a>
          <a id="profileUpdate" ng-click="showProfilePopup()">Profile</a>
        </div>
      </div>

    </div>

    <div class="right" id="right">
      <div class="img_n_name2" ng-if="receiverImg">
        <img id="image_chatting_user" ng-src="{{receiverImg}}" alt="{{receiverName}}">
        <strong id="chatting_user_name">{{receiverName}}</strong>
      </div>
    </div>

  </header>

  <div class="c1">
    <div class="l1">
      <div class="search">

        <form class="searchform">
          <input type="text" placeholder="Search" ng-model="filterName" ng-change="filterUser()">
          <button class="search_button"><i class="fa fa-search"></i></button>
        </form>

      </div>

      <div class="listscroll">
        <p class="no-user" ng-if="showingEmpty">There's no user</p>
        <a ng-repeat="user in FilteredUserList" ng-click="getChats(user.uniqueId, user.name, user.img_path)">
          <div class="listuser">
            <img ng-src="{{user.img_path}}" ng-alt="{{user.name}}" width="48" height="48">
            <strong id="nn">{{user.name}}</strong>
          </div>
        </a>
      </div>

    </div>

    <div class="r1">

      <div id="user-data">

        <div class="message" ng-repeat="message in allMessages" ng-class="message.sender_id != receiverId ? 'self' : 'other'">
          <div class="message__wrapper">
            <img width="48" height="48" ng-src="{{receiverImg}}" alt="{{receiverName}}" class="receiverImg">
            <span class="message__content">{{message.message}}</span>
            <img width="48" height="48" ng-src="{{currentUserImage}}" alt="{{currentUserName}}" class="currentUserImage">
          </div>
        </div>

      </div>

      <div class="input_message_div">

        <form id="myForm" ng-submit="sendNewMessage()">
          <input type="text" id="input_message_id" name="msg" placeholder="Type a message..." ng-model="newMsg" ng-disabled="isInput">
          <input type="hidden" name="receiver_id" id="receiverIdField" ng-model="receiverId">
          <button type="submit" id="input_user_message_button" ng-disabled="isInput" ng-if="newMsg">
            <i class="uil uil-message"></i>
          </button>
        </form>

      </div>

    </div>

    <div id="popupContainer" ng-if="isPopUp">
      <div id="popupContent">

        <div class="popup_tittle">
          <span>Profile</span>
          <a id="closePopUp" ng-click="hideProfilePopup()"><i class="fi fi-rr-rectangle-xmark"></i></a>
        </div>

        <div class="profile_Details">

          <div id="profilePic">
            <img id="popProfile" ng-src="{{currentUserImage || '/photo/placeholder-profile.jpg'}}" alt="{{currentUserName}}">
          </div>

          <p id="namePop"><strong>{{currentUserName}}</strong></p>
          <p id="emailPop"><strong>{{currentUserEmail}}</strong></p>

        </div>

      </div>
    </div>
  </div>
  

  <!-- JS files -->
  <script src="script/App.js"></script>


</body>



</html>