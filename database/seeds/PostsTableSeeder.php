<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Image;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app_0 = Post::create(
            array(
                'id'      => '1',
                'title'   => 'Super Usuario',
                'content' => 
                    ' É claro que o início da atividade geral de formação de atitudes aponta para a melhoria das condições inegavelmente apropriadas.\r\n
                     Percebemos, cada vez mais, que a adoção de políticas descentralizadoras assume importantes posições no estabelecimento do investimento em reciclagem técnica.',
                'slug'    => 'super-usuario',
                'user_id' => '1'
            )
        );
        $img = Image::create(
            array(
                'url' => 'images\imagem_005.jpg',
                'name'=> 'imagem_005.jpg',
                'post_id' => '1',                
            )
        );


        $app_1 = Post::create(
            array(
                'id' => "4",
                'title'   => 'F1 2019',
                'content' => 
                    ' O primeiro jogo a apresentar os conceitos de construção de baralho foi o The Base Ball Card Game, criado pela empresa americana The Allegheny Card Co. e registrado em 4 de Abril de 1904[2].\r\n
                    \r\n
                    No mercado americano era comum desde o inicio do século XX a comercialização de figurinhas de jogadores de Beisebol. Com o passar das décadas outros temas foram incorporados pelos fabricantes: esportes, filmes, heróis de quadrinho, etc.\r\n
                    \r\n
                    \r\n
                    Jogos como Strat-O-Matic, Nuclear War, BattleCards e Illuminati se assemelham e precedem os jogos de cartas colecionáveis.\r\n
                    \r\n
                    Magic: The Gathering, criado por Richard Garfield e publicado pela Wizards of the Coast, foi o primeiro jogo a apresentar o conceito moderno de cartas colecionáveis.[3]\r\n
                    \r\n
                    https://pt.wikipedia.org/wiki/Jogo_de_cartas_colecionáveis',
                'slug'    => 'f1-2019',
                'user_id' => '1'
            )
        );
        $img2 = Image::create(
            array(
                'url' => 'images\1024px-Cartas_e_dados_Magic.jpg',
                'name'=> '1024px-Cartas_e_dados_Magic.jpg',
                'post_id' => '4',                
            )
        );
   

        $app_2 = Post::create(
            array(
                'id' => "2",
                'title'   => 'F1 2019',
                'content' => 
                    '  Fórmula 1 (também F1; em inglês: Formula One) é a mais popular modalidade de automobilismo do mundo. É a categoria mais avançada do esporte a motor e é regulamentada pela Federação Internacional de Automobilismo. Desde 2014 são usados motores elétricos com duas baterias internas e seis cilindros em "V", com indução forçada por turbocompressor e auxilio dos sistemas MGU-K e MGU-H (Elétricos).\r\n
                    \r\n
                    Ao contrário do que muitos acreditam, o registro oficial da categoria consta como Fórmula Um (Campeonato Mundial de Fórmula Um), com o numeral escrito por extenso, mas também se aceita o uso do 1 e do I em (romano).\r\n
                    Fonte: https://pt.wikipedia.org/wiki/F%C3%B3rmula_1',
                'slug'    => 'f1-2019',
                'user_id' => '1'
            )
        );
        $img3 = Image::create(
            array(
                'url' => 'images\000_1LD4UM-crop-1570950747-1200x410.jpg',
                'name'=> '000_1LD4UM-crop-1570950747-1200x410.jpg',
                'post_id' => '2',                
            )
        );
 

    }
}
