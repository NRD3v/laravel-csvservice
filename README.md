# laravel-csvservice
Overlay for Laravel Excel import/export

1) Download folder
2) Put it in your Laravel "Model" folder
3) In app/config.php below your third party service providers listing, add :
  \YOURFOLDER\CSV\App\Laravel\CSVServiceProvider::class
  
4) Optionnally you can create an alias into your aliases listing :
  "CSVService" => \YOURFOLDER\CSV\App\Laravel\CSVServiceProvider::class
  
4) Replace everywhere "YOURFOLDER" by your own project name in :
  CSV/App/Laravel/CSVServiceProvider.php
  CSV/Domain/Services/CSVService.php
  
5) Run composer to update the dependancy

HOW TO USE ?

In a controller or any other file :
1) Declare a new var : $CSVService
2) Inject the dependancy : public function __construct(CSVService $CSVService) { this->CSVService = $CSVService; }
3) Start to use : this->CSVService->methodToUse()
