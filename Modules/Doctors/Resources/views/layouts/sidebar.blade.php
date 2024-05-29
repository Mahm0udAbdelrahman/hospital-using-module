    <nav class="mdc-persistent-drawer__drawer">
      <div class="mdc-persistent-drawer__toolbar-spacer">
        <a href="index.html" class="brand-logo">
                      <img src="{{ asset('dashboard/images/logo.svg')}}" alt="logo">
                  </a>
      </div>
      <div class="mdc-list-group">
        <nav class="mdc-list mdc-drawer-menu">
          <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="{{ route('doctors.index') }}">
              <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">desktop_mac</i>
              Dashboard
            </a>
          </div>
          
          <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="{{ route('sicks.index') }}">
              <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
              Sicks
            </a>
          </div>
          <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="{{ route('requests.index') }}">
              <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
              Requests
            </a>
          </div>





        </nav>
      </div>
    </nav>
