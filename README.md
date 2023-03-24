Utilizzo template:
creare il db
copiare il file .env.example e rinominarlo in .env
collegare il db nel file .env
eseguire composer install
eseguire il comando php artisan key:generate
eseguire npm i


Consegna:
creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.


Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.

Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze per l'autenticazione (utilizziamo il template con Bootstrap). OK


Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
- Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office OK
- Creazione del modello Project con relativa migrazione, seeder, controller e rotte
- Per la parte di back-office creiamo un resource controller Admin\\ProjectController OK
- per gestire tutte le operazioni CRUD dei progetti (READ - index, show; CREATE - create, store)


##Consegna 23/3 
Continuiamo a lavorare nella repo dei giorni scorsi e aggiungiamo un'immagine ai nostri progetti.
Ricordiamoci di creare il symlink con l'apposito comando artisan e di aggiungere l'attributo enctype="multipart/form-data" ai form di creazione e di modifica!

Bonus
Alla creazione di un nuovo progetto, fare in modo che Laravel invii una mail (su Mailtrap).
 

 PASSI:
 1. AUTENTICAZIONE
 - Creazione del progetto di Laravel con Breeze
 - Questo permette di avere già a disposizione file (controllers, migrations, views, model relativi a Utente e sue azioni di login, logout, reset psw, cancellazione account) + pagina di atterraggio (dashboard) per admin
 - Creo DB del progetto (migration user esiste già ma va importata nel DB tramite comando php artisan migrate - conviene una volta fatto anche migration del contenuto (?))
 - Collego DB a Laravel modificando .env
 - In questo caso era già stato fatto MA se ho una dashboard per l'admin è meglio inserire come rotta admin/dashboard. Per farlo:
    > creo controller Admin/PageController
    > sposto funzione anonima da rotte a PageController
    > importo PageController in rotte e richiamo la funzione
    > modifico rotta e nome della rotta attraverso un prefisso per non doverlo ripetere ogni volta
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware([auth, verified])->name('dashboard');
        });
    > in Providers > RouteServiceProvider modifico const HOME con nuova rotta '/admin/dashboard'

    2. OPERAZIONI CRUD
    - Si dà per scontato che è stato già creato il DB e modificato file .env
    - Unico comando per creare i file di base per operazioni crud
        php artisan make:model -help 
        (così vedo sigle dei file che mi servono)

        php artisan make:model Project -msrR

    - Così vengono creati: model, migration, seeder, controller con resource (quindi già con tutte le funzioni predisposte per crud), requests. 
    - Migration -> aggiungo colonne
    - Comando -> php artisan migrate
    - Model -> fillable per evitare MassAssignment
    - Seeder -> aggiungo dati
    - Database Seeder -> $this->call([ProjectSeeder::class]) -- questo passaggio non mi è chiaro
    - Comando -> php artisan db:seed --class=ProjectSeeder
    - Controller -> per coerenza sposto il file in Admin; ricorda: modifica namespace, importa estensione controller (use App\Http\Controllers\Controller), modifica importazione in rotte
    - Procedo con operazioni crud

    3. AGGIUNTA FILE 
   
   Se servisse aggiungere una colonna alla table:
   - comando:
   php artisan make:migration add_img_to_projects_table (nuova colonna salva stringa con percorso relativo)
   - dropDown(nomecolonna) da non considerare più

   a. config > filesystem: modifica che tipo di accesso ha user (local, public, s3)
   b. .env: modifica filesystem
   c. Link da storage a public:
        - comando
        php artisan storage:link
   d. Front-end > create.blade.php: 
    - <form enctype="multipart/form-data">
    - <input type="file" accept="image/*">
   e. Back-end > StoreProjectRequest: validazione nuova colonna con tipo di file e dimensione max
   f. Back-end > Model: rendi fillable nuova colonna
   g. Back-end > ProjectController:
        - importa Facade\Storage
        - convertire file in stringa (all'interno di cartella public)
   h. Front-end > show.blade.php
     - mostra img -> src="{{ asset('storage/'.$project->img)}}"
     - alla condizione che l'immagine ci sia (if altrimenti legge img fino a storage/)
      d. Front-end > edit.blade.php: 
    - <form enctype="multipart/form-data">
    - <input type="file" accept="image/*">
    - condizione per far vedere img precedente ({{ old non funziona con file }})
   i. Back-end > UpdateProjectRequest: validazione nuova colonna con tipo di file e dimensione max
   l. Back-end > ProjectController:
        - convertire file in stringa (all'interno di cartella public) ->condizioni (checkbox + esistenza img)
   m. Front-end > show.blade.php
     - mostra img -> src="{{ asset('storage/'.$project->img)}}"
     - alla condizione che l'immagine ci sia (if altrimenti legge img fino a storage/)
   n. Back-end > ProjectController > destroy (cancella file oltre che cancella tutto il progetto)
   


    