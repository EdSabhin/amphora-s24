<div class="form-check row" :class="{'has-danger': errors.has('visible'), 'has-success': fields.visible && fields.visible.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="visible" type="checkbox" v-model="form.visible" v-validate="''" data-vv-name="visible"  name="visible_fake_element">
        <label class="form-check-label" for="visible">
            {{ trans('admin.article.columns.visible') }}
        </label>
        <input type="hidden" name="visible" :value="form.visible">
        <div v-if="errors.has('visible')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('visible') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.article.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subHeadline'), 'has-success': fields.subHeadline && fields.subHeadline.valid }">
    <label for="subHeadline" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.subHeadline') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.subHeadline" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('subHeadline'), 'form-control-success': fields.subHeadline && fields.subHeadline.valid}" id="subHeadline" name="subHeadline" placeholder="{{ trans('admin.article.columns.subHeadline') }}">
        <div v-if="errors.has('subHeadline')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subHeadline') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('article'), 'has-success': fields.article && fields.article.valid }">
    <label for="article" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.article') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.article" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('article'), 'form-control-success': fields.article && fields.article.valid}" id="article" name="article" placeholder="{{ trans('admin.article.columns.article') }}">
        <div v-if="errors.has('article')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('article') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image'), 'has-success': fields.image && fields.image.valid }">
    <label for="image" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.image') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="file" v-model="form.image" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('image'), 'form-control-success': fields.image && fields.image.valid}" id="image" name="image" placeholder="{{ trans('admin.article.columns.image') }}">
        <div v-if="errors.has('image')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('video'), 'has-success': fields.video && fields.video.valid }">
    <label for="video" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.video') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.video" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('video'), 'form-control-success': fields.video && fields.video.valid}" id="video" name="video" placeholder="{{ trans('admin.article.columns.video') }}">
        <div v-if="errors.has('video')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('video') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('audio'), 'has-success': fields.audio && fields.audio.valid }">
    <label for="audio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.audio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.audio" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('audio'), 'form-control-success': fields.audio && fields.audio.valid}" id="audio" name="audio" placeholder="{{ trans('admin.article.columns.audio') }}">
        <div v-if="errors.has('audio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('audio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('videoUrl'), 'has-success': fields.videoUrl && fields.videoUrl.valid }">
    <label for="videoUrl" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.videoUrl') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.videoUrl" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('videoUrl'), 'form-control-success': fields.videoUrl && fields.videoUrl.valid}" id="videoUrl" name="videoUrl" placeholder="{{ trans('admin.article.columns.videoUrl') }}">
        <div v-if="errors.has('videoUrl')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('videoUrl') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('audioUrl'), 'has-success': fields.audioUrl && fields.audioUrl.valid }">
    <label for="audioUrl" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.audioUrl') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.audioUrl" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('audioUrl'), 'form-control-success': fields.audioUrl && fields.audioUrl.valid}" id="audioUrl" name="audioUrl" placeholder="{{ trans('admin.article.columns.audioUrl') }}">
        <div v-if="errors.has('audioUrl')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('audioUrl') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('file'), 'has-success': fields.file && fields.file.valid }">
    <label for="file" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.article.columns.file') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.file" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('file'), 'form-control-success': fields.file && fields.file.valid}" id="file" name="file" placeholder="{{ trans('admin.article.columns.file') }}">
        <div v-if="errors.has('file')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('file') }}</div>
    </div>
</div>


