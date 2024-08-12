angular.module('index-app', [])
  .controller('index-controller', function ($rootScope, $scope, $document, $http, $timeout) {

    $rootScope.currentUserId = localStorage.getItem('sender_id');
    // console.log($rootScope.currentUserId, "sender id")

    // showing current user profile details popup
    $scope.isPopUp = false;
    $scope.currentUserImage = localStorage.getItem('img_path');
    $scope.currentUserName = localStorage.getItem('username');
    $scope.currentUserEmail = localStorage.getItem('email');

    $scope.showProfilePopup = function () {
      $scope.isPopUp = !$scope.isPopUp;
      $scope.isDropdownMenu = false;
    }
    $scope.hideProfilePopup = function () {
      $scope.isPopUp = false;
    }
    // end

    // showing dropdown menu
    $scope.isDropdownMenu = false;
    $scope.showDropdownMenu = function () {
      $scope.isDropdownMenu = !$scope.isDropdownMenu;
    }
    // end

    // hide drpdown and popup when click on body
    $document.on('click', function (event) {

      // hide dropdown 
      var target = angular.element(event.target);
      var dropdown = angular.element(document.querySelector('.dropdown'));
      var dropdownButton = angular.element(document.querySelector('.dropdown-button'));
      if (!dropdownButton[0].contains(target[0]) && !dropdown[0].contains(target[0]) && $scope.isDropdownMenu) {
        $scope.$apply(function () {
          $scope.isDropdownMenu = false;
        });
      }
      // end


      // hide profile popup
      var popupContainer = angular.element(document.querySelector('#popupContainer')) || '';
      if (event.target == popupContainer[0]) {
        $scope.$apply(function () {
          $scope.isPopUp = false;
        });
      }
      // end

    });
    // end

    // list user fetch (showing all user )
    $http.get("php_api/list_user.php")
      .then(res => {
        $scope.userList = [];
        // console.log($scope.userList, "$scope.userList")
        for (id in res.data) {
          if ($rootScope.currentUserId != id) {
            // console.log(res.data[id], ": user");
            $scope.userList.push({ uniqueId: id, name: res.data[id].name.toLowerCase(), img_path: res.data[id].img_path });
          }
        }
        $scope.FilteredUserList = $scope.userList;
      }).catch((err) => {
        console.log(err, "maybe, some error in api request")
      })
    // end

    // showing list based on input filter
    $scope.filterUser = function () {
      if ($scope.filterName) {
        $scope.FilteredUserList = $scope.userList.filter(one => one.name.includes($scope.filterName.toLowerCase()));
        // console.log($scope.FilteredUserList, "fileres")
        $scope.showingEmpty = false;
        if (!$scope.FilteredUserList.length) {
          $scope.showingEmpty = true;
        }
      } else {
        $scope.FilteredUserList = $scope.userList;
        $scope.showingEmpty = false
      }
    }
    // end

    // showing particular chats
    $scope.isInput = true;
    $scope.getChats = function (userId, name, img_path) {

      $scope.isInput = false;
      $scope.receiverId = userId;
      $scope.receiverName = name;
      $scope.receiverImg = img_path;

      const userDataElement = document.getElementById('user-data');

      $http.get(`php_api/getUserData.php?userId=${userId}`)
        .then(res => {
          $scope.allMessages = res.data;

          // Scroll to the bottom after the DOM updates
          $timeout(function () {
            userDataElement.scrollTop = userDataElement.scrollHeight;
          }, 0);

        }).catch(err => {
          console.log(err, "some error in API");
        });

        $timeout(()=>{
          document.getElementById('input_message_id').focus();
        },0)
    };
    // end

    // sending latest message
    $scope.sendNewMessage = function () {

      if ($scope.newMsg) {

        const formData = new FormData();

        formData.append('receiver_id', $scope.receiverId);
        formData.append('msg', $scope.newMsg);

        // for(let entry of formData.entries()){
        //   console.log(entry[0], ": ", entry[1])
        // }

        $scope.newMsg = '';

        // Send the FormData using $http
        $http.post('php_api/inputmsg.php', formData, {
          headers: { 'Content-Type': undefined }
        }).then(function (response) {
          if (response.status === 200) {

            const userDataElement = document.getElementById('user-data');
            $http.get(`php_api/getUserData.php?userId=${$scope.receiverId}`)
              .then(res => {

                $scope.allMessages = res.data;

                // Scroll to the bottom after the new messages
                $timeout(function () {
                  userDataElement.scrollTop = userDataElement.scrollHeight;
                }, 0);
              }).catch(err => {
                console.log(err, "some error in API");
              });
          }
        }).catch(function (error) {
          console.error("Error sending data:", error);
        });
      }
    };
    // end






















  })


























