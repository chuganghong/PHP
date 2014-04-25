<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<script type="text/javascript">
function addFavorite(){

    if (document.all){
	
        try{
            window.external.addFavorite(window.location.href,document.title);
        }catch(e){
            alert( "加入收藏失败，请使用Ctrl+D进行添加" );
        }

    }else if (window.sidebar){
	//alert(2);
	try{
       window.sidebar.addPanel(document.title, window.location.href, "");
	   }catch (e) {
	   alert( "加入收藏失败，请使用Ctrl+D进行添加" );
	   }
     }
}
</script>
<p><span onclick="addFavorite()">AddFavorite</span></p>