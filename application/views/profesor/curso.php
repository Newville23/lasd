<div class="container-fluid" style="margin-top: 5%;">

	<div class="row-fluid">
		
		<div class="span4 well bloque" id="menu">

			<div class="row-fluid">

				<div class="span7 fontSize2">
					<?php // Carga el menu principal para el profesor
					$this->load->view('profesor/includes/menu'); ?>
				</div>

				<div class="span5 padding1" id="materias2">
					<?php // Carga la lista de cursos que da el profesor
					$this->load->view('profesor/includes/menu-curso'); ?>
				</div>
			</div>
		</div>
		
		<div class="span8 padding2 well-margin-botton">
			<?php // Carga el muro, cuadro principal donde se despliegan varias tareas (foro, trabajos...)
			$this->load->view('profesor/includes/muro'); ?>
		</div>
		
	</div>
</div>

<!-- --------------------------------------  Modal del foro  --------------------------------------------------- -->

	<div id="myModal" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
			  <p id="myModalLabel" class="muted">Foro de discución de la materia</p>
		</div>
		<div class="modal-body" id="">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, qui, sapiente, minima perferendis laboriosam maiores et ullam quod ea harum omnis provident saepe tempora aut rerum esse nobis beatae quo facere sunt dignissimos alias reprehenderit impedit atque blanditiis nam sint quis veniam nemo quibusdam odit sed dolorum in. Labore, dolorum, nobis, ad, illo sunt odio iste maiores vero libero corporis obcaecati quas incidunt fuga tempore totam molestias unde ducimus minima? Blanditiis, debitis, quisquam, dicta natus non unde maiores fuga architecto possimus dignissimos totam assumenda expedita dolor praesentium voluptatibus aliquam vel sequi sunt veniam laudantium ipsa iusto nostrum illum sed quae labore consequatur repellat quaerat dolorem dolores ipsam ducimus ullam iste incidunt velit sapiente laborum quos. Doloremque, ipsam, ratione excepturi omnis a quas harum ab atque! Corporis, nisi, eligendi, tempore id fugit impedit quae odit ipsam cum dolore quidem nobis quia amet deserunt dolorum. Iste expedita ratione sunt amet doloribus praesentium inventore incidunt natus. Architecto, quidem, maxime, ducimus, vero aliquid minus aliquam quia consequatur modi ex nemo ullam similique nesciunt odio magni sint quaerat enim beatae totam hic sapiente iusto officiis ipsa iure quas libero quisquam reprehenderit excepturi tempora veniam esse sequi mollitia dicta amet reiciendis nihil laudantium unde obcaecati maiores sit? Nobis, perferendis, vel, quidem perspiciatis facilis nesciunt quam voluptates ea ab illum dicta error quasi natus eos incidunt optio eius iure aspernatur alias cum earum dolorum voluptatibus quis quas nihil ut velit tenetur ipsum totam autem amet doloribus impedit reprehenderit sed fugiat magni modi explicabo. Qui, repellat, officia, totam laudantium nisi assumenda ab tempore a labore eos vero eius asperiores adipisci aut velit. Deserunt, sed, odit eius facere sequi ipsam totam consequatur excepturi soluta omnis maxime at laudantium doloribus neque vel temporibus eaque architecto nulla vitae pariatur dolor doloremque atque velit laborum veritatis magni esse voluptas repellat aperiam provident quaerat saepe ab hic iure aspernatur rerum dignissimos. Labore accusamus necessitatibus cum ex at eaque voluptates magnam! Inventore, iusto, voluptas impedit magnam nam totam dolore distinctio asperiores repellendus aut iste quos doloremque. Iure, nisi, ullam, nulla perspiciatis iste architecto deserunt quibusdam blanditiis aliquam eaque laudantium molestias quis suscipit dignissimos similique dolorum cupiditate nobis quod nostrum quos modi veniam earum dolores veritatis ipsam magnam facilis aliquid tempora ea quae commodi magni dolor incidunt. Quisquam, doloribus, nulla quaerat amet accusantium laborum quam veniam voluptatibus sequi fugit aperiam labore ipsum doloremque voluptates unde vel quidem saepe adipisci tempora eaque qui expedita pariatur consectetur reiciendis dignissimos dolore magnam quasi in laudantium rerum iste porro error esse et nisi officiis placeat. Eius, vero, a, neque, velit sapiente voluptatum quasi ab ducimus veniam nemo vel sit beatae quo qui porro facilis ipsam distinctio eveniet architecto adipisci recusandae corporis provident reprehenderit quos laborum ullam ipsum earum fugit esse nobis. Laboriosam, quisquam, ab, aliquid, obcaecati ut numquam eligendi accusantium recusandae ratione optio beatae nemo sunt natus voluptates aspernatur excepturi sint. Voluptate, fuga, odit, et, nisi culpa impedit perferendis iure rem maxime porro sequi corporis tempore iste delectus sit unde soluta voluptas ipsam itaque laudantium velit voluptatum harum similique!</p>
			
		</div>
		<div class="modal-footer">
			  
		</div>
	</div>
