<div class="container tournaments-container">

  <h2> Tournaments
    <span class="tooltip"><i class="fas fa-info-circle"></i>
      <span class="tooltiptext">View the stages and participants of upcoming/running tournaments.</span></span></h2>

    <ul class="slider">
        <?php
        $break = 0;
        if (!empty($slider)) {
            foreach ($slider as $key => $item) { ?>
                <li class="slider-item">
                    <span class="slider-item--titles">
                        <p class="slider-item--content__league"><?php echo $item["league"]['name'] ?></p>
                        <p class="slider-item--content__tournament"><?php echo $item["name"] ?></p>
                    </span>
                    <div class="slider-item--icon">
                        <img class="slider-item--icon__image" src=" <?php echo $item["league"]["image_url"] ?> "/>
                    </div>
                    <div class="slider-item--content">
                        <p class="slider-item--content__name">
                            <?php if ($item["videogame"]['name'] == 'LoL') {
                                echo 'League of Legends';
                            } else {
                                echo $item["videogame"]['name'];
                            } ?>
                        </p>
                        <p class="slider-item--content__date"><?php echo date('d F H:i', strtotime($item["begin_at"]) + 60 * 60) ?> till <?php echo date('d F H:i', strtotime($item["end_at"]) + 60 * 60) ?></p>
                    </div>
                    <!-- Match, Team & Tournament Tree Icons -->
                    <div class="switch-icons">
                      <a class="slider-item--info" title="Tournament Info">
                        <i class="fas fa-info-circle"></i>
                      </a>
                      <a class="slider-item--bracket" title="View Tournament Bracket" href="<?php echo URL; ?>bracket" >
                        <i class="fas fa-code-branch"></i>
                      </a>
                      <a class="slider-item--teams" title="View Teams">
                        <i class="fas fa-users"></i>
                      </a>
                    </div>

                    <!-- Match & Team Cards info: TEAM -->
                    <div class="slider--item__info-team">
                      <div class="title-box">
                        <div class="upper-title"> Participants </div>
                        <?php if (!$item["name"] == null || !$item["name"] == "") { ?>
                                <div class="lower-title"><?php echo $item['name'] ?></div>
                        <?php } else { ?>
                                <div class="lower-titleNone">--</div>
                        <?php } ?>
                      </div >
                      <div class="team-box">
                        <div class="team-text">

                          <?php $itemTeamsCounter = 0; ?>
                          <?php if (!$item["teams"] == null || !$item["teams"] == "") { ?>
                              <?php foreach ($item["teams"] as $key => $itemTeams) { ?>
                                <div class="team-title"><span class="team-acr">(<?php echo $itemTeams['acronym'];?>)</span> - <?php echo $itemTeams['name'];?> </div>
                                <?php $itemTeamsCounter++; ?>
                              <?php } ?>
                          <?php } else { ?>
                              <p> No Team Info </p>
                          <?php } ?>
                        </div>
                    </div>
                      <?php if (!$item["teams"] == null || !$item["teams"] == "") { ?>
                            <div class="result-count"><?php echo $itemTeamsCounter ?> team(s)</div>
                      <?php } else { ?>
                            <div class="result-count">0 team(s)</div>
                      <?php } ?>

                    </div>

                    <!-- Match & Team Cards info: MATCH -->
                    <div class="slider--item__info-match">
                      <div class="title-box">
                        <div class="upper-title"> Stages </div>
                        <?php if (!$item["serie"]["name"] == null || !$item["serie"]["name"] == "") { ?>
                                <div class="lower-title"><?php echo $item["serie"]['name'] ?></div>
                        <?php } else { ?>
                                <div class="lower-titleNone">--</div>
                        <?php } ?>
                      </div >
                      <div class="match-box">
                        <div class="match-text">
                          <?php $itemMatchesCounter = 0; ?>
                          <!-- reverse tournament match array -->
                          <?php $original = $item["matches"]; ?>
                          <?php $reversed = array_reverse($original); ?>

                          <!-- store only unique name values for matches instead of duplicates-->
                          <?php $unique = array(); ?>
                          <?php foreach ($reversed as $key => $itemMatches) {
                                     $unique[] = $itemMatches['name'];
                                } ?>
                          <?php $uniqueMatch = array_unique($unique); ?>

                          <?php if (!$item["matches"] == null || !$item["matches"] == "") { ?>
                              <?php foreach ($uniqueMatch as $val) { ?>
                                <div class="info-title"><?php echo $val; ?></div>
                                <?php $itemMatchesCounter++; ?>
                              <?php } ?>
                          <?php } else { ?>
                              <p> stages unkown </p>
                          <?php } ?>
                        </div>
                    </div>
                      <?php if (!$item["matches"] == null || !$item["matches"] == "") { ?>
                            <div class="result-count"><?php echo $itemMatchesCounter ?> stage(s)</div>
                      <?php } else { ?>
                            <div class="result-count">no stage(s)</div>
                      <?php } ?>

                    </div>
                </li>
                <?php
                $break++;
                if ($break == 48) break;
            }
        } ?>

    </ul>
</div>
