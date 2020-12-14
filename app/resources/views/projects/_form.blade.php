@csrf 

<div class="form-group">
  <label for="text">Título del proyecto</label>
  <input 
    type="text" 
    class="form-control border-0 bg-light shadow-sm" 
    id="text" 
    type="text" 
    name="title"
    value="{{old('title', $project->title)}}"
    placeholder="Escriba el título del proyecto..."
    >
</div>

<div class="form-group">
  <label for="url">URL del proyecto</label>
  <input 
    type="text" 
    class="form-control border-0 bg-light shadow-sm" 
    id="url" 
    name="url"
    value="{{old('url', $project->url)}}"
    placeholder="Esriba url del proyecto..."
  >
</div>

<div class="form-group">
  <label for="content">Descripción del proyecto</label>
    <textarea 
      class="form-control border-0 bg-light shadow-sm" 
      name="content"
      placeholder="Escriba la descripción del proyecto..."
    >{{old('content', $project->content)}}
  </textarea>
</div> 

<button class="btn btn-primary btn-lg btn-block">{{$btnText}}</button>

<a class="btn btn-link btn-block" href="{{route('projects.index')}}">Cancelar</a>