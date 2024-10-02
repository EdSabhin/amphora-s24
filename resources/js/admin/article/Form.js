import AppForm from '../app-components/Form/AppForm';

Vue.component('article-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                visible:  false ,
                title:  '' ,
                subHeadline:  '' ,
                article:  '' ,
                image:  '' ,
                video:  '' ,
                audio:  '' ,
                videoUrl:  '' ,
                audioUrl:  '' ,
                file:  '' ,
                
            }
        }
    }

});