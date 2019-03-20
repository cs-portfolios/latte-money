// とりあえずは全体のjavascriptの予定

// submitボタンを押した時に、if文で項目が入力されているかを調べる

const postCheck = () => {
  let product = document.forms["postForm"].elements["product"].value;
  let price = document.forms["postForm"].elements["price"].value;
  let date = document.forms["postForm"].elements["date"].value;

  if (product == "" || price == "" || date == "") {
    alert("空欄があります");
    return false;
  } else {
    return true;
  }
};
// sign in form check
const signupCheck = () => {
  let name = document.forms["signupForm"].elements["name"].value;
  let password = document.forms["signupForm"].elements["password"].value;

  if (name == "" || password == "") {
    alert("空欄があります");
    return false;
  } else {
    return true;
  }
};
// login form check
const loginCheck = () => {
  let name = document.forms["loginForm"].elements["name"].value;
  let password = document.forms["loginForm"].elements["password"].value;

  if (name == "" || password == "") {
    alert("空欄があります");
    return false;
  } else {
    return true;
  }
};

const deleteAlert = () => {
  let res = confirm("削除しますか？");
  if (res == true) {
    return true;
  } else {
    return false;
  }
};

// 日付の投稿フォームに今日の日付をデフォルトで入れる
$(function() {
  (today = new Date()),
    (year = today.getFullYear()),
    (month = today.getMonth() + 1),
    (date = today.getDate());
  if (month < 10) month = "0" + month;
  if (date < 10) date = "0" + date;
  $('input[type="date"][value="today"]').each(function() {
    $(this).attr({ value: year + "-" + month + "-" + date });
  });
});
