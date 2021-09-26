window.onload = () => {
// GET メソッドの実装の例
  async function getData(url, data = '') {
// 既定のオプションには * が付いています
    const response = await fetch(url + (data != '' ? '?' + data : ''), {
      method: 'GET',// *GET, POST, PUT, DELETE, etc.
      headers: {'Content-Type': 'text/plain'},//平文 = ただの文字列 name=Orange

      mode: 'cors',// no-cors, *cors, same-origin
      cache: 'no-cache',// *default, no-cache, reload, force-cache, only-if-cached
      credentials: 'same-origin',// include, *same-origin, omit
      redirect: 'follow',// manual, *follow, error
      referrerPolicy: 'no-referrer'// no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    });
    return response.json();// レスポンスの JSON を解析
  }

// POST メソッドの実装の例 GET付
  async function postData(url, data, query = '') {
// 既定のオプションには * が付いています
    const response = await fetch(url + (query != '' ? '?' + query : ''), {
      method: 'POST',// *GET, POST, PUT, DELETE, etc.
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: data,// 本文のデータ型は "Content-Type" ヘッダーと一致する必要があります

      mode: 'cors',// no-cors, *cors, same-origin
      cache: 'no-cache',// *default, no-cache, reload, force-cache, only-if-cached
      credentials: 'same-origin',// include, *same-origin, omit
      redirect: 'follow',// manual, *follow, error
      referrerPolicy: 'no-referrer'// no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    });
    return response.json();// レスポンスの JSON を解析
  }

// GETの呼び出し例
  document.getElementById('get').onclick = e => {
    e.preventDefault();
    getData('ajax.php', 'name=' + document.getElementById('fruit').value)//name=Orange
    .then(data => {
      console.log(data);//レスポンス
      const text = document.getElementById('response');
      text.textContent = '';
      if(data.result === 0) text.textContent = data.count;
    });
  };

// POSTの呼び出し例
  document.getElementById('post').onclick = e => {
    e.preventDefault();
    postData('ajax.php', 'name=' + document.getElementById('fruit').value)//name=Apple
    .then(data => {
      console.log(data);//レスポンス
      const text = document.getElementById('response');
      text.textContent = '';
      if(data.result === 0) text.textContent = data.count;
    });
  };
};