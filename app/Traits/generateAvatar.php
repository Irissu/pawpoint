<?php
namespace App\Traits;
	
	Trait generateAvatar {
		
		public function generateRandomAvatar() {
		 // lo uso en la vista vets
			$email = $this->email ?? 'default@example.com'; 
			$hash = md5(strtolower(trim($email)));
			
			return "https://www.gravatar.com/avatar/{$hash}?s=80&d=mp";
		}

		public function uploadMyAvatar() {
		
			return 'whatever';
		}
	
	}
?>