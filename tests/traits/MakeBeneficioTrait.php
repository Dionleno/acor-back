<?php

use Faker\Factory as Faker;
use App\Models\Beneficio;
use App\Repositories\BeneficioRepository;

trait MakeBeneficioTrait
{
    /**
     * Create fake instance of Beneficio and save it in database
     *
     * @param array $beneficioFields
     * @return Beneficio
     */
    public function makeBeneficio($beneficioFields = [])
    {
        /** @var BeneficioRepository $beneficioRepo */
        $beneficioRepo = App::make(BeneficioRepository::class);
        $theme = $this->fakeBeneficioData($beneficioFields);
        return $beneficioRepo->create($theme);
    }

    /**
     * Get fake instance of Beneficio
     *
     * @param array $beneficioFields
     * @return Beneficio
     */
    public function fakeBeneficio($beneficioFields = [])
    {
        return new Beneficio($this->fakeBeneficioData($beneficioFields));
    }

    /**
     * Get fake data of Beneficio
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBeneficioData($beneficioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'descricao' => $fake->text,
            'tipo' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $beneficioFields);
    }
}
