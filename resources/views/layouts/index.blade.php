<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="grid grid-cols-3 gap-10">
        <!--Left | subject list-->
        <div>
            
            <!--Headline-->
            <div class="py-2">
                <h1 class="text-gray-600">Projects</h1>
            </div>
            
            <!--List of projects-->
            <div class=''>
                <div class='leading-tight'>
                    @foreach( $projects_all as $project_tmp )
                        <div class="py-2">
                            <!--Project title-->
                            <div class="">
                                <a href="/projects/{{ $project_tmp->id }}">
                                    <h3 class="text-gray-700 font-semibold">{{ $project_tmp->title }}</h3>
                                </a>
                            </div>
                            
                            <!--Show details of the related project -->
                            @if( $project_tmp->id == $project->id )
                                <div class="">
                                    
                                    <!--Date on which the project was created-->
                                    <div>
                                        <p class='py-1 text-xs'>Created on: {{ $project->updated_at }}</p>
                                    </div>
                                    
                                    <!--List of the subjects-->
                                    <div class="py-1">
                                        @foreach( $project_tmp->subjects as $subject_tmp )
                                            <div class="mb-1 mx-2">
                                                <a href="/subjects/{{ $subject_tmp->id }}">
                                                    <h4 class="text-sm">- {{ $subject_tmp->title }}</h4>
                                                    @if( isset( $subject_tmp->lab_note()->performed_on ) )
                                                        <p class='text-xs text-gray-700'>   {{ $subject_tmp->lab_note()->performed_on }}</p>
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>  
                            @endif  <!--Show details of the related project -->
                        </div>
                    @endforeach
                </div>
            </div> <!--List of projects-->
        </div> <!--Left-->
        
        <!--Right | detail of a subject-->
        <div class="col-span-2">
            @yield('contents')
        </div> <!--right-->
    </div> <!--grid-->

</x-app-layout>