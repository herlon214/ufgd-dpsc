<?php

use Illuminate\Database\Seeder;

class ClassifiedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values[] = [
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Maquina de assar frango',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consectetur finibus fermentum. Sed nec nisi quam. Maecenas et velit neque. Proin venenatis, nisl vel feugiat feugiat, ante lectus maximus leo, a maximus risus quam in felis. Quisque sit amet lorem ac nibh egestas hendrerit. Donec rutrum dui et nisi ornare, eu sollicitudin elit auctor. Ut dolor nisl, consectetur non ante et, aliquet congue leo. Curabitur condimentum diam enim, ac pharetra neque molestie et. Quisque sit amet scelerisque ex, et efficitur libero. Fusce in cursus libero, efficitur aliquet neque. Curabitur odio sem, pharetra eget pellentesque cursus, dictum ut elit. Nulla nibh elit, viverra elementum libero vel, lacinia rutrum nulla.
            
            Aenean sagittis egestas sem, vehicula tincidunt urna mattis eget. Nunc et arcu non orci egestas pharetra vel vitae mauris. Nunc placerat pellentesque felis, in dapibus lectus. Praesent auctor nec tortor non tempor. Nullam in neque quis urna auctor ultrices ac eu nunc. Praesent metus mi, elementum in enim facilisis, cursus malesuada augue. Phasellus nec commodo enim, at accumsan risus. Aliquam urna felis, pretium at mi quis, fermentum semper mauris. Quisque quam turpis, ornare vel iaculis et, ullamcorper eu felis. In bibendum dapibus nisi. Curabitur vulputate quam enim, vel facilisis elit egestas eget. Praesent sodales molestie posuere. Mauris ultrices efficitur mi sit amet consectetur.
            
            Nulla nec posuere felis, sit amet mollis nisl. Morbi eu ligula eget lorem volutpat euismod. Pellentesque lacus dui, facilisis sed rutrum a, vehicula quis risus. Nullam convallis enim eu lorem ullamcorper laoreet. Nullam eget sodales odio, ut egestas velit. Sed eget aliquam justo, quis cursus purus. Aliquam velit mi, consequat quis commodo et, lobortis sed massa. Quisque venenatis malesuada ligula, ac bibendum nisl tristique non. Proin vehicula, est sit amet posuere imperdiet, mauris tortor fringilla purus, ut varius eros nunc ac nibh. Sed nec dolor efficitur, eleifend mi imperdiet, fermentum lectus. Praesent turpis turpis, eleifend at diam id, volutpat luctus leo. In tempor magna at nunc ultrices, eu ornare diam placerat. Integer viverra accumsan urna sit amet vestibulum. Duis eu elit in tellus elementum vulputate. Nam pulvinar, neque eu volutpat vehicula, leo neque rutrum dolor, ut accumsan urna libero nec libero. Fusce est eros, faucibus at velit vitae, posuere fermentum lorem.',
            'state' => 'MS',
            'cep' => '79740-000',
            'contact_phone' => '(67) 9 9660 6804',
            'contact_name' => 'Herlon Aguiar'
        ];

        $values[] = [
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'Carro Civic',
            'description' => '*EXCELENTE ESTADO DE CONSERVAÇÃO
            
            *86.500km
            
            *CARRO COMPLETÍSSIMO
            
            *BANCOS EM COURO
            
            #MOTIVO VENDA (COMPRA DE UM IMÓVEL)#
            
            ESTUDO TROCA POR CARRO ATÉ R$ 20.000,00
            
            MAIORES INFORMAÇÕES:
            NERILO 99964-1131 whats
            
            Valor: R$ 42.000,00
            Finalidade: Vender
            Tipo: Carro
            Marca: - HONDA
            Modelo: Civic Sedan
            Cor: PRETA
            Ano: 2011
            Combustivel: Flex',
            'state' => 'MS',
            'cep' => '79740-000',
            'contact_phone' => '(44) 99964-1131',
            'contact_name' => 'Nerilo'
        ];
        $values[] = [
            'user_id' => 1,
            'category_id' => 2,
            'title' => '13 MIL JARDIM ORIENTAL SARANDI',
            'description' => 'JARDIM ORIENTAL, DIVISA COM MARINGÁ !!!
            
            CASA PRONTA PARA VENDA NO PROGRAMA MINHA CASA MINHA VIDA NA DIVISA DE MARINGÁ...
            
            CASA AVALIADA POR R$ 145 MIL.
            
            IMÓVEL COM VISTORIA DA CAIXA FEITA E APROVADA... 
            
            JARDIM ORIENTAL/ DIVISA COM MARINGÁ !!!
            
            JÁ TEM UM POSTO DE SAÚDE FUNCIONANDO NO BAIRRO, ÓTIMA LOCALIZAÇÃO, BAIRRO NOVO COM TODA A INFRAESTRUTURA PRONTA, ASFALTO NOVÍSSIMO, REDE DE ESGOTO, ETC...
            
            ESSE BAIRRO FICA, ATRÁS DA NOMA, FAZ DIVISA COM MARINGÁ...
            
            ACEITAMOS SEU FUNDO DE GARANTIA (FGTS) COMO ENTRADA PARA AJUDAR VOCÊ A FINANCIAR O VALOR RESTANTE ATRAVÉS DO FINANCIAMENTO MINHA CASA MINHA VIDA.
            
            UMA OUTRA OPÇÃO, O CONSTRUTOR PARCELA A ENTRADA NO CHEQUE PARA FACILITAR A SUA COMPRA, IMPERDÍVEL...
            
            DESCRIÇÃO DO IMÓVEL:
            
            2 QUARTOS 
            SALA
            COZINHA COM MURETA REVESTIDA COM GRANITO
            1 BANHEIRO
            ÁREA DE SERVIÇO COBERTA 
            GARAGEM P/ 2 CARROS 
            MUROS E PORTÕES ALTOS
            PONTO P/ PORTÃO ELETRÔNICO 
            QUINTAL GRANDE NA FRENTE E NO FUNDO DA CASA
            TERRENO ENORME...
            ',
            'state' => 'MS',
            'cep' => '79740-000',
            'contact_phone' => '(44)99718-7777',
            'contact_name' => 'Francielly'
        ];


        DB::table('classifieds')->insert($values);
    }
}
