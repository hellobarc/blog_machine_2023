window.addEventListener('load', function () {
    axios.get(featured_post)
    .then((response) => {
       let resp = response.data.data;
       let slider_content =``;
            resp.forEach((item)=>{
                slider_content   += `<div class="slider-box-layout8">
                                        <div class="item-img">
                                            <img src="uploads/article/thumbnail/thumbnail.jpg" alt="slider">
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Finance</li>
                                                <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                            </ul>
                                            <h3 class="item-title"><a href="single-blog.html">Hown Island Formsn River And Stones</a></h3>
                                        </div>
                                    </div>`;
                                    })

            document.getElementById("slider_content").innerHTML = slider_content;
    })
    .catch((err)=>{
        console.log(err);
    });
  }, false);


(function(){

})();
