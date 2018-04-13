select 
       d.id,
       d.departamento, 
       d.icons,
       count(i.id) as qtd_ind,
       (count(i.id) - count(v.Realizado)) as qtd_preenchida,
       ((count(i.id) - count(v.Realizado)) / count(i.id)) as 'percent'
from 
       tb_departaments as d
join 
       tb_indicador as i
             on d.id = i.departamentoID
left join
       (
   		select 
				i.id,
				i.nome,
				count(da.id) as Realizado
			from 
				tb_dadosmes as da
		      inner join 
		   	tb_indicador as i
	      on i.id = da.idIndicador
			where 
		  	da.valor is null
			and da.mes = vMes 
		   and da.ano = vAno
			group by 
			i.id
      	 ) as v
       		on i.id = v.id
where i.ano = vAno and d.active = 'Y'
group by 
       d.id,
       d.departamento
order by 
		d.departamento